<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
 	header("Location:../Controller/Login.php");
 }
 ?>
 <?php include('../View/HEADER.html')?>
<?php include "../Model/FUNCTION.php"?>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="../VIEW/A.css">
	<style type="text/css">
	div.sticky 
	{
	  position: -webkit-sticky;
	  position: sticky;
	  top: 0;
	  background-color: #74A7CE;
	  padding: 5px;
	  font-size: 20px;
	}
	.footer 
	{
	   left: 0;
	   bottom: 0;
	   width: 100%;
	   background-color: #74A7CE;
	   color: black;
	   margin: 0px;
	   text-align: center;
	}

	.dropbtn 
	{
	  background-color: #8CE5E5;
	  border-radius: 25px;
	  color: white;
	  padding: 6px;
	  font-size: 10px;
	  border: none;
	  cursor: pointer;
	  margin-left: 200px;
	}

	.dropdown 
	{
	  position: relative;
	  display: inline-block;
	}

	.dropdown-content 
	{
	  display: none;
	  position: absolute;
	  right: 0;
	  background-color: #f9f9f9;
	  min-width: 130px;
	  box-shadow: 0px 6px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}

	.dropdown-content a 
	{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}

	.dropdown-content a:hover {background-color: #38B6B6;}

	.dropdown:hover .dropdown-content 
	{
	  display: block;
	}

	.dropdown:hover .dropbtn 
	{
	  background-color: #38B6B6;
	   border-radius: 25px;
	}
	</style>
	<div class="sticky">
		<?php include('../VIEW/HF/HEADER.html')?>
	</div>
	<h1 style="text-align:center;" ><u>Change password</u></h1>
</head>
<body>
	<a href="../View/Profile.php">Back</a> 
	<p> || </p>

	
	<h1 style="text-align:center;" ><u>WELCOME <?php echo $_SESSION['Username']; ?></u></h1>
	<form name="jsform"  action='../Controller/ChangePasswordAction.php' method= "post" onsubmit="return isValid(this);">
	
		
		<fieldset>
		
		<u>Previous password*</u>: 
		<input type="Password" name="Password1">
			<br>
			<br>
			
		<u>New password*</u>: 
		<input type="Password" name="Password2">
			<br>
			<br>	
			
		<u>Confirm password*</u>: 
		<input type="Password" name="Password3">
			<br>
			<br>	
		
		
		<input type="submit" name="submit" value="Chnage">
	</form>
	<p id="msg"></p>
  <script>
    function isValid(jsform)
    {
      const Password1= jsform.Password1.value;
      const Password2= jsform.Password2.value;
      const Password3= jsform.Password3.value;
      if (Password1 === "" || Password2 === ""|| Password3 === "") {
        document.getElementById("msg").innerHTML = "Please fill up the form properly";
        return false;
      }
      return true;
    }
  </script>
	
<?php include('../VIEW/HF/FOOTER.html'); ?>	
</body>
</html>


			



