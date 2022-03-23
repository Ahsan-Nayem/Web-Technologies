 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Submission</title>
</head>


	<h1><u>Registration</u></h1>
	
 <body>
 <?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") {
		
		if (!empty($_POST["Firstname"])) 
		{
			$Firstname=$_POST["Firstname"];
        }
		else 
		{
			echo "Name is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
if (!empty($_POST["Lastname"]))
		{
			$Lastname=$_POST["Lastname"];
			
        }
		else
		{
			echo "Name is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }

		if (!empty($_POST["Gender"]))
		{
			$Gender=$_POST["Gender"];
			
        }
		else
		{
			echo "Gender is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
        if (!empty($_POST["Dob"]))
		{
			$Dob=$_POST["Dob"];
			
        }
		else
		{
			echo "Dob is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
		if (!empty($_POST["Religion"]))
		{
			$Religion=$_POST["Religion"];
			
        }
		else
		{
			echo "Religion is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
		if (!empty($_POST["PresentAddress"]))
		{
			$PresentAddress=$_POST["PresentAddress"];
			
        }
		else
		{
			echo "Address is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
        if (!empty($_POST["PermanentAddress"]))
		{
			$PermanentAddress=$_POST["PermanentAddress"];
			
        }
		else
		{
			echo "Address is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
		if (!empty($_POST["Phone"]))
		{
			$Phone=$_POST["Phone"];
			
        }
		else
		{
			echo "Phone is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
        }
		if (!empty($_POST["Email"])) 
		{
			$Email=$_POST["Email"];
			
        }
		else 
		{
			echo "Email is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
			
        }
			
		if (!empty($_POST["Username"])) 
		{
			$Username=$_POST["Username"];
			
        }
		else 
		{
			echo "Username is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
			
        }
			if (!empty($_POST["Password"])) 
		{
			$Password=$_POST["Password"];
			
        }
		else 
		{
			echo "Password is not  declared";
			echo "<br>";
			echo "Please submit again";
			echo "<br>";
			echo "<br>";
			
        }

	}
?>

<?php

	$isValid = false;

	if (empty($Firstname)or empty($Lastname)or empty($Gender)or empty($Dob)or empty($Religion)or empty($PresentAddress)or empty($PermanentAddress)or empty($Phone) or empty($Email)  
		or empty($Username) or empty($Password)  ){
		$isValid = false;
		echo "Please submit again ";
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

		$sql = "INSERT INTO user_info (Firstname, Lastname, Gender, Dob,Religion,PresentAddress,PermanentAddress,Phone,Email,Username,Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$stmt = $connection->prepare($sql);
		$stmt->bind_param("sssssssssss", $Firstname,$Lastname,$Gender,$Dob,$Religion,$PresentAddress, $PermanentAddress,$Phone, $Email, $Username, $Password);
		$Firstname = $_POST["Firstname"];
		$Lastname= $_POST["Lastname"];
		$Gender= $_POST["Gender"];
		$Dob= $_POST["Dob"];
		$Religion= $_POST["Religion"];
		$PresentAddress = $_POST["PresentAddress"];
      $PermanentAddress = $_POST["PermanentAddress"];
      $Phone = $_POST["Phone"];
		$Email = $_POST["Email"];
		$Username = $_POST["Username"];
		$Password = $_POST["Password"];
		
		$response = $stmt->execute();

		if ($response) {
			echo "Data Inserted Succssfully";
			
		}
		else {
			echo "Error while saving";
		}
	}
	else
	 {
	 	echo "<b>Validation Error</b>"; 
	 }
?>

<br>
<br>
 <a href="Login.php">Click Here For LOG IN</a> 
    <br>

	</body>
	</html>
