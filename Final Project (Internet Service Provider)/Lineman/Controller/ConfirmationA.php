<?php 
 
	  if ($_SERVER['REQUEST_METHOD'] === "POST"){
		  
		$decode = json_decode($_POST["obj"], false);
		
		$Userid=$decode->Userid;
		$Problem=$decode->Problem;
		$Status=$decode->Status;
	

		$isValid = false;

	if (empty($Userid)or empty($Problem)or empty($Status)){
		$isValid = false;
		//echo "Please submit again ";
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

		$sql = "INSERT INTO confirmation (Userid, Problem, Status) VALUES (?, ?, ?)";

		$stmt = $connection->prepare($sql);
		$stmt->bind_param("sss", $Userid,$Problem,$Status);
	
		
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
	 	//echo "<b>Validation Error</b>"; 
	 }
	  }
		
	?> 