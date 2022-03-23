<!DOCTYPE html>
<?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Comand</title>
</head>
<body>
 

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<fieldset>
	<u>User Name</u>: <input type="text" name="USERNAME">
	<br>
	<br>
	<input type="submit" name="submit" value="Action">
	</fieldset>
	</form>
	<?php
	$filename="../Model/COMMUNICATION.json";
	
	$arr2=read($filename);
	?>
	<table border="1">
		 
		 <thead>
		 <tr>
		  <th>CUSTOMER USER NAME</th>
		 <th>AREA</th>
		 <th>DESCRIPTION(CUSTOMER)</th>
		 <th>DESCRIPTION(LINEMAN)</th>
		 <th>STATUS</th> 
		 </tr>
		 </thead>
		 <tbody>
		 <?php
		 
		 for ($j=0;$j<count($arr2);$j++)
		 {
			 echo "<tr>";
			 echo "<td>".$arr2[$j]-> Username."</td>";
			 echo "<td>".$arr2[$j]-> area."</td>";
			 echo "<td>".$arr2[$j]-> description."</td>";
			 echo "<td>".$arr2[$j]-> solution."</td>";
			 echo "<td>".$arr2[$j]-> status."</td>";
			 echo "</tr>";
		 } 	 
		 ?>
		 </tbody>
		 </table> 
	</form>
	
	<?php 
			
	  if ($_SERVER['REQUEST_METHOD'] === "POST") 
	  {

		
		$isValid = false;
		if (empty($_POST['USERNAME'])) 
		{
			$isValid = false;
		echo "<u>";
		echo "<h3>Find empty value in Mandatory section....... </h3>";
		echo "</u>";
		echo "<br>";
		if (!empty($_POST['USERNAME'])) 
		{
        }
		else 
		{
			echo "USER Name is not  declared";
			echo "<br>";
        }

	
		}
		else {
			$isValid = true;
		}
			$filename="../Model/COMMUNICATION.json";	
			$A="Username";
			$USERNAME=$_POST['USERNAME'];
			$arr0=search($filename, $A,$USERNAME);
			if($arr0)
			{
			$isValid = true;
			$USERNAME=$_POST['USERNAME'];
			$arr3[]=getone($filename, $A,$USERNAME);
			for ($j=0;$j<count($arr3);$j++)
			{

			 $US=$arr3[$j]->Username;
			 $AREA=$arr3[$j]->area;
			 $PK=$arr3[$j]->description;
			 $SL=$arr2[$j]-> solution;
			 $AC=$arr3[$j]->status;
			 $ID=$arr3[$j]-> id; 
			 
			}
			if($USERNAME==$US)
			{
				$isValid=true;
				$arr2[]=getone($filename, $A,$USERNAME);
			
			 for ($j=0;$j<count($arr2);$j++)
			{

			 $US1=$arr2[$j]->Username;
			 $AREA=$arr2[$j]->area;
			 $DES=$arr2[$j]->description;
			 $SOLUTION=$arr2[$j]-> solution;
			 $ST=$arr2[$j]->status;
			 $ID=$arr2[$j]-> id; 
			}
					
			}
			else
			{
				$isValid=false;
				echo "<br>";
				echo "Username is not matched";
			}
			
				
			}
			else
			{
				$isValid = false;
			}
		
		
		if ($isValid) { 
		
			$STATUS="CONFIRMED";
			$arr1 = array('Username' =>$US1,'area' =>$AREA,
			'description' =>$DES,'solution' =>$SOLUTION ,'status' =>$STATUS,'id' => $ID);
			
			$up=update($filename,$arr1,$A,$USERNAME);
			
			if($up==true)
			{
				"<h3>Update successful1</h3>";
			}
			else
			{
				echo "<h3>Password is not update</h3>";
			}
			
			echo "<h3>Update successful2</h3>";
			
		}
		else{
			echo "<h3>Something Validation is error</h3>";
		}
	 }

	?>


</body>
</html>
<?php include('../View/FOOTER.html')?>
