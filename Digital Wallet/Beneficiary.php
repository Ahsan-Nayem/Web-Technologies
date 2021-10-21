<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Beneficiary</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h1>Add Beneficiary</h1>
	<br>
	<h2>Digital Wallet</h2>
	<br>
	1 <a href="Home.php">Home</a>
	2 <a href="Beneficiary.php">Add Beneficiary </a>
	3 <a href="Transaction History.php">Transaction History </a>
	<br><br>
    Beneficiary Name:<input type ="text" name="Beneficiary">

	 Mobile Number:<input type="tel" name="Phone" >
	 <input type="submit" name="submit" value="submit">
	<br>
	</form>
	<?php
 if ($_SERVER['REQUEST_METHOD'] === "POST"){
 	$isValid=false;
if(empty($_POST['Beneficiary']) or empty($_POST['Phone']))
{
$isValid=false;
echo"<br>";
echo" Requirred";
  echo"<br>";
 }
 else{
  $isValid=true;
 }

 }


 ?>
	</boady>
   </html>