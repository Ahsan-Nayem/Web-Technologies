
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Salary</title>
</head>
<body>

<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../Controller/Login.php");
 }
 ?>
 <?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<h1 style="text-align:center;"><u>Salary History</u></h1>
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
			$sql = "SELECT * FROM salary ";
			$stmt = $connection->prepare($sql);
			

			
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
	<br>
	<br>
	<table border="1">
		 
		 <thead>
		 <tr>
		 <th>Id</th>
		  <th>Year</th>
		 <th>Month</th>
		 <th>Status</th>
		 
		 
		 
		 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
			if($res==true)
			{
				
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>". $row["Id"]."</td>"; 
						echo "<td>". $row["Year"]."</td>";
						echo "<td>".$row["Month"]."</td>";
						echo "<td>".$row["Status"]."</td>";
						
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