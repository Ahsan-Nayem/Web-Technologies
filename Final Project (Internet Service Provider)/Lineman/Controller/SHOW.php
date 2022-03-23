<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../Controller/Login.php");
 }
 ?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="TABLE.css">
	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
		.dropbtn {
  background-color: #8CE5E5;
  border-radius: 25px;
  color: white;
  padding: 6px;
  font-size: 10px;
  border: none;
  cursor: pointer;
    margin-left: 200px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 130px;
  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #38B6B6;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #38B6B6;
   border-radius: 25px;
}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
			<h1 style="text-align:center;" ><u>Show Profile</u></h1>
</head>

<body id="B_Color">


 <?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "etwo";
		$res="";
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
			$sql = "SELECT * FROM user_info WHERE Username = ? ";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param("s", $Username);
			$Username=$_SESSION['Username'];
			
			$response = $stmt->execute();

			if ($response) {
				$data = $stmt->get_result();
				if ($data->num_rows > 0) 
				{
				  $res=true;
					
				}
				else
				{
					$res=false;
					echo "Row cannot found";
					
				}
			}
			else
			{
				echo "Database Execution failed!!!!!!!!";
			}
		
	?>
	<a href="../View/Home.php">Back</a>
	<br>
	<br>
	<table id="table">
		 
		 <thead>
		 <tr>
		 <th>Firstname</th>
		  <th>Lastname</th>
		 <th>Gender</th>
		 <th>Date of Birth</th>
		 <th>Religion</th>
		 <th>PresentAddress</th>
		 <th>PermanentAddress</th>
		 <th>Phone</th>
		 <th>Email</th>
		 <th>Username</th>
		 <th>Password</th>
		 
		 
		 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["Firstname"]."</td>"; 
						echo "<td>". $row["Lastname"]."</td>";
						echo "<td>".$row["Gender"]."</td>";
						echo "<td>".$row["Dob"]."</td>";
						echo "<td>".$row["Religion"]."</td>";
 						echo "<td>".$row["PresentAddress"]."</td>";
 						echo "<td>".$row["PermanentAddress"]."</td>";
						echo "<td>".$row["Phone"]."</td>";
						echo "<td>".$row["Email"]."</td>";
						echo "<td>".$row["Username"]."</td>";
						echo "<td>".$row["Password"]."</td>";
						
						echo "</tr>";
						
					}
			}
			else
			{
					
				echo "Details Cannot be found";
			}
			
		  
		 ?>
		 </tbody>
		 </table>
		 <br>
		 <br>
		 <br>
		 <?php include('../View/FOOTER.html')?>
</body>
</html>