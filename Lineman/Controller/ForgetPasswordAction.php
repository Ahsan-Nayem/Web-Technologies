<?php
 session_start();
 if(count($_SESSION)===0)
 {
	echo "seassion doesnot created";
 }
 ?>
<?php include "../Model/FUNCTION.php"?>
<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$Password1=$Password2=$Password3="";
		$isValid = false;
		
		if ( empty($_POST['Password2']) 
			or empty($_POST['Password3'])or empty($_POST['OTP'])){
			$isValid = false;
		echo "<u>";
		echo "<h3>Fill all the sections </h3>";
		echo "</u>";
		echo "<br>";
		if (!empty($_POST['password2'])) 
		{			
        }
		else 
		{
			echo "New Password is not declare";
			echo "<br>";		
        }
		if (!empty($_POST['password3'])) 
		{
        }
		else 
		{
			echo "Confirm Password is not declare";
			echo "<br>";			
        }
		
		}
		else {
			$isValid = true;
		}
		
	$Password2=$_POST['Password2'];
   $Password3=$_POST['Password3'];	
	$OTP=$_POST['OTP'];

	if($isValid)
	{	
	if($Password2==$Password3)
	{
	if ($isValid) 
		{
	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "etwo";
			$connection = new mysqli($servername, $username, $password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
				
			$sql = "UPDATE user_info SET Password = ?  WHERE Username = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $Username, $Password);
			$Username=$_POST['Username'];
			$Password=$_POST['Password'];

			$response = $stmt->execute();

			if ($response) 
			{
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
					while ($row = $data->fetch_assoc()) {

						echo "<br>";
						echo "Mobile Number Matched";
						echo "<br>";
						$OTP1=rand(10,1000);
						echo $OTP1;
						echo "<br>";
						session_start();
						$_SESSION['OTP1']=$OTP1;
						$_SESSION['phone']=$_POST['phone'];
						header("Location:../CONTROLLER/FORGET_PASSWORD_A2.php");
						die();
					}
				}
				else
				{
					echo "<br>";
					echo "Phone Number is not Found";
				}
				
				
				
			}
			else
			{
				echo "<br>";
				echo "Execution error";
			}
		
	}
	else
	{
		echo "<br>";
		echo "Somethig Validation Priblem";
		echo "<br>"	;
	}
	}
	?>
  }
  else
  {
	  echo "<h3>OTP IS WRONG</h3>";
  }
		
	}	
	?>
	