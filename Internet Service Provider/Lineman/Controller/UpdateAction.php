<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../Controller/Login.php");
 }
 ?>

	<?php
	 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$decode = json_decode($_POST["obj"], false);
		
		$Firstname=$decode->Firstname;
		$Lastname=$decode->Lastname;
		$Gender=$decode->Gender;
		$Dob=$decode->Dob;
		$Religion=$decode->Religion;
		$PresentAddress=$decode->PresentAddress;
		$PermanentAddress=$decode->PermanentAddress;
		$Phone=$decode->Phone;
		$Email=$decode->Email;
		

		$isValid = false;
		if (empty($Firstname)or empty($Lastname) or empty($Gender) 
			or empty($Dob) or $Religion=="select s value" or empty($PresentAddress)or empty($PermanentAddress)or empty($Phone) or empty($Email) )
		{
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
			
				
		
		}
		else {
			$isValid = true;
		}
		if($isValid)
		{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "etwo";
		
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM user_info WHERE Username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $Username);
			$Username=$_SESSION['Username'];
			$response = $stmt->execute();
			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
				  while ($row = $data->fetch_assoc()) {
						
					
				}
			}
				else
				{
					$$isValid=true;
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		}
		
	
	
	if($isValid)
		{
			
			$sql2 = "UPDATE user_info SET Firstname = ?,Lastname = ?, Gender = ? , Dob = ?, Religion = ?, PresentAddress = ?,PermanentAddress = ?,
			Phone = ?, Email = ? WHERE Username = ?";
			$stmt2 = $connection->prepare($sql2);
			$stmt2->bind_param("ssssssssss", $Firstname,$Lastname, $Gender, $Dob, $Religion, $PresentAddress,$PermanentAddress, $Phone, $Email,$Username);
			 $Username=$_SESSION['Username'];	
			 $response2 = $stmt2->execute();
			
			if ($response2)
				{	
					echo "<h3>Update successful</h3>";
				}

				else
				{
					echo "<h3>Unique field Violation</h3>";
					echo "<h3>Please Update again</h3>";
				}
				
			}
			else
			{
				echo "<h3>Validation Erorr</h3>";
			}
		
	}		
		
		else{
			echo "<h3>Something Validation is error</h3>";
		}
		
	?>

