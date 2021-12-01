 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Submission</title>
</head>


	<h1><u>Registration</u></h1>
	
 <body>

 	<script>
		function isValid(jsform)
		{
			const Username= jsform.Username.value;
			const Password= jsform.password.value;
			if (Username === "" || Password === "") {
				document.getElementById("msg").innerHTML = "Please submit again properly";
				return false;
			}
			return true;
		}
	</script>

 <?php 
	  { if (!empty($_POST["Username"])) 
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
			
		
	}
?>

<?php

	$isValid = false;

	if (empty($Username)or empty($Password) or empty($Email) ){
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

		$sql = "INSERT INTO info (Username,Password,Email) VALUES (?, ?, ?)";
      $stmt = $connection->prepare($sql);
		$stmt->bind_param("sss",$Username, $Password, $Email);
		$Username = $_POST["Username"];
		$Password = $_POST["Password"];
		$Email = $_POST["Email"];
		
		
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
 <a href="Registration Form.html">Registration form ..</a> 
    <br>
    <script>
		function sendData(formData) {
			if (formData.Username.value === "" || formData.Password.value === "" || formData.Email.value === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
			}

			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msg").innerHTML = this.responseText;
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"Username" : formData.Username.value,
				"Password" : formData.Password.value,
				"Email" : formData.Email.value
			}
			xhttp.send("obj="+JSON.stringify(myData));
		}
	</script>

	</body>
	</html>
