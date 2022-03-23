<!DOCTYPE html>
<?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Forget Password</title>
	<h1 style="text-align:center;" ><u>Forget Password</u></h1>
</head>
<body>
	<a href="../View/Login.php">Back</a>
	<br>
	<br>
	
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
		
		<u>Username</u>:

		<input type="text" id="text" name="Username" >
		<br>
		<br>
		<input type="submit" name="submit" value="GET OTP">
		</form>
		
		
	<?php
	if ($_SERVER['REQUEST_METHOD'] === "POST") 
	{
		$Username="";
		$isValid = false;
	if (empty($_POST['Username']))
	{
		$isValid = false;
		echo "<h3>Fill the   section </h3>";
	}
	else
	{
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
			$Username=$_POST['Username'];
			$response = $stmt->execute();

			if ($response) 
			{
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
					while ($row = $data->fetch_assoc()) {

						echo "<br>";
						echo "Username Matched";
						echo "<br>";
						$OTP1=rand(10,1000);
						echo $OTP1;
						echo "<br>";
						session_start();
						$_SESSION['OTP1']=$OTP1;
						$_SESSION['Username']=$_POST['Username'];
						header("Location:../Controller/FORGET_PASSWORD_A2.php");
						die();
					}
				}
				else
				{
					echo "<br>";
					echo " Not Found";
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
	
</body>
</html>
<?php include('../View/FOOTER.html')?>