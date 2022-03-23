<?php 
 
	  if ($_SERVER['REQUEST_METHOD'] === "POST"){
		  
		  
		$decode = json_decode($_POST["obj"], false);
		
		$Employeeid=$decode->Employeeid;
		$Request=$decode->Request;
		$Details=$decode->Details;


		
		
		$isValid = false;

	if (empty($Employeeid)or empty($Request)or empty($Details)){
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

		$sql = "INSERT INTO request (Employeeid, Request, Details) VALUES (?, ?, ?)";

		$stmt = $connection->prepare($sql);
		$stmt->bind_param("sss", $Employeeid,$Request,$Details);
	
		
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