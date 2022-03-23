<?php 
		session_start();
		 if(count($_SESSION)===0)
		 {
			header("Location:../CONTROLLER/LOG_OUT.php");
		 }
	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "etwo";
		$res="";
		$USERNAME=$_SESSION['Username'];
		$connection = new mysqli($servername, $username, $password, $dbname);
		if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
		}
	
		
		$sql = "SELECT * FROM user_info WHERE username = ?";
		$stmt = $connection->prepare($sql);
		$stmt->bind_param("s", $USERNAME);
		$USERNAME=$_SESSION['Username'];
		$response = $stmt->execute();
		$result = $stmt->get_result();
		$arr1 = array();
		if($response)
		{
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($arr1, 
					array('Firstname' => $row['Firstname'],
					'Lastname' => $row['Lastname'],
					'Gender' => $row['Gender'],
					'Dob' => $row['Dob'],
					'Religion' => $row['Religion'],
					'PresentAddress' => $row['PresentAddress'],
					'PermanentAddress' => $row['PermanentAddress'],
					'Phone' => $row['Phone'],
					'Email' => $row['Email']
					));
			}
			echo json_encode($arr1);
		}
		}
		else
			
			{
				echo "error";
			}
?>