<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transaction History</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<h1>Transaction History</h1>
    <br>
    <h2>Digital Wallet</h2>
    <br><br>
    1 <a href="Home.php">Home</a>
    2 <a href="Beneficiary.php">Add Beneficiary</a>
    3 <a href="Transaction History.php">Transaction History</a>
    <br> <br><br>


            From: <input type="datetime-local"  name="From">
            To: <input type="datetime-local"  name="To">
            <input type="submit" name="search" value="search">
</form>
<?php
 if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $isValid=false;
if(empty($_POST['From']) or empty($_POST['To']))
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