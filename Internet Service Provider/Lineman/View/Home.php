
<?php
 session_start();
 if(count($_SESSION)===0)
 {session_unset();
		session_destroy();
	echo "Seasson unsent....";
 }

 ?>
<!DOCTYPE html>









<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>

	<style>
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
    <?php include('../VIEW/HF/HEADER_A.html')?>
  </div>
</head>
<?php
$cookie_name = "time";
$cookie_value = date("M,d,Y h:i:s A");;
setcookie($cookie_name, $cookie_value, time() + (10), "/"); 
?>
<h1 style="text-align:right;">
<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
 
  echo "Time and Date : "; 
  echo  $_COOKIE[$cookie_name];
}
?>
</h1>

<body>

















	<h1 style="text-align:center;" >Lineman</h1>
    <p>WELCOME, <?php echo $_SESSION['Username']; ?></p>
	
	<h3 style="text-align:right;" ><a href="../View/Login.php<?php  ?>">Logout</a></h3>
	<p>  </p>
	




<div id="example2"  >

<div class="dropdown" style="float:left;" style=" border-radius: 0px;">
  <button class="dropbtn"><h2>Profile</h2></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../Controller/SHOW.php">User Details</a></h3>
  <a href="../Controller/Change Password.php">Change Password</a>
	<a href="../Controller/Update.php">Update Profile</a>
  </div>
</div>


<!--img src="Speed_test.JPG" alt="Paris" width="400" height="400" style="text-align: center;"-->


<div class="dropdown" style="float: left;" style=" border-radius: 5px; margin-left: 100px;">
  <button class="dropbtn" ><h2>Request </h2></button>
  <div class="dropdown-content" style="left: 0;">
	<a href="../Controller/Equipment.php">Equipment Request</a>
	<a href="../Controller/Request.php">Request </a> 
  </div>
</div>

<div class="dropdown" style="float: left;" style=" border-radius: 5px;">
  <button class="dropbtn"><h2> Confirmation  </h2></button>
  <div class="dropdown-content" style="left: 0;">
	<a href="../Controller/Confirmation.php">Confirmation </a>
  </div>
</div>


<div class="dropdown" style="float:left" style=" border-radius: 5px;">
  <button class="dropbtn"><h2>See Salary</h2></button>
  <div class="dropdown-content" style="left: 0;">
  <a href="../Controller/Tasklist.php">to see Salary</a> 
  </div>
</div>
</div>

<br>









<!--
User Profile: 
    <a href="../View/Profile.php<?php  ?>">Click here</a>
 
	<br>
	<br>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
	1. Admin Comand: 
    <a href="../Controller/LINEMAN_BOX_A.php<?php  ?>">Click here</a> to see Admin Command for you.
 
	<br>
	<br>
		2. Send Confirmation: 
		<a href="../Controller/Confirmation.php">Click here</a> to send a Confirmation.

	<br>
	<br>
	
		3.	Equipment Request: 
		c
		
	<br>
	<br>

			
4.	Salary History
<a href="../Controller/Tasklist.php">Click here</a> to see Salary for you.
<br>
	<br>
5.	Rquest To Manager 
<a href="../Controller/Request.php">Click here</a> to see Available task list for you.
<br>
<br>-->


	<br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="footer">
      <?php include('../VIEW/HF/FOOTER.html'); ?> 
  </div>
</body>
</html>
