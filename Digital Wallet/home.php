<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<h1>Home</h1>
	<br>
	<h2>Digital Wallet</h2>
	<br>
	1 <a href="Home.php">Home</a>
	2 <a href="Beneficiary.php">Add Beneficiary</a>
	3 <a href="Transaction History.php">Transaction History</a>
	<br>

	<h2>Fund Transfer: </h2>
	<br>
	Select Category: 
			<select name="Category">
				<option value="">select a value</option>
				<option value="SendMoney">Send money</option>
				<option value="MobileRecharge">Mobile Recharge</option>
				<option value ="Payment">Payment</option>
				<option value="Others">Others</option>
			</select>
	<br><br>
	 
			To: <select name="To">
				<option value="">select a value</option>
				<option value="Ahsan">Ahsan</option>
				<option value="Nayem">Nayem</option>
				<option value="Shakib">Shakib</option>
				<option value="Mashrafee">Mashrafee</option>
			</select>		
		<br><br>
		Amount : <input type ="text" name="Amount"min="0.00" max="100000000000.00">
        <br><br>
		<input type="submit" name="submit" value="submit">
	</form>
<?php
 if ($_SERVER['REQUEST_METHOD'] === "POST"){
 	$isValid=false;
if($_POST['Category']=="" or $_POST['To']==""or empty($_POST['Amount']))
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