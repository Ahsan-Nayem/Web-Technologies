<a href="../View/Home.php">Home</a>
<html>
<head>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../Controller/Login.php");
 }
 ?>
 <?php include('../View/HEADER.html')?>
<?php include "../Model/FUNCTION.php"?>
<meta charset="utf-8">
	<title style="text-align:center;">Change password</title>
	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	</head>
<?php 
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {
		$Password1=$Password2=$Password3="";
		$isValid = false;
		
		if (empty($_POST['Password1']) or empty($_POST['Password2']) 
			or empty($_POST['Password3'])){
			$isValid = false;
		echo "<u>";
		echo "<h3>Fill all the sections </h3>";
		echo "</u>";
		echo "<br>";
			if (!empty($_POST['Password1'])) 
		{
        }
		else 
		{
			echo "Previous Password is not declare";
			echo "<br>";
        }
		if (!empty($_POST['Password2'])) 
		{			
        }
		else 
		{
			echo "New Password is not declare";
			echo "<br>";		
        }
		if (!empty($_POST['Password3'])) 
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
	
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "etwo";
			$connection = new mysqli($servername, $username, $password, $dbname);
			if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
			}
			
			
			$sql = "SELECT * FROM user_info WHERE Username = ? and Password = ?";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("ss", $Username, $Password);
			$Username=$_SESSION['Username'];
			$Password=$_POST['Password1'];
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) {
					while ($row = $data->fetch_assoc()) {

						$isValid=true;
					}
				}
				else
				{
					
					$isValid=false;
					echo "<br>";
					echo "Previous Password is not matched";
				}
			}
			
			$Password2=$_POST['Password2'];
			$Password3=$_POST['Password3'];
			
								
			if($Password2==$Password3)
			{
				
				if ($isValid) 
				{
					
					$sql2 = "UPDATE user_info SET Password = ? WHERE Username = ?";
					$stmt2 = $connection->prepare($sql2);
					$stmt2->bind_param("ss", $Password2, $Username);
					 $Password2=$_POST['Password2'];
					 $Username=$_SESSION['Username'];	
					 $response2 = $stmt2->execute();
					
					if ($response2)
						{	
							echo "<h3>Password Changed successful</h3>";
						}

						else
						{
							echo "<h3>Execution error</h3>";
							echo "<h3>Please try  again</h3>";
						}

				
				}
				else{
					echo "<h3>Something Validation is error</h3>";
				}		
				
			}
			else
			{
				echo "Current and confirm password is not match";
			}
		
		
	}	
		
		
	?>
	<?php include('../VIEW/HF/FOOTER.html'); ?>	