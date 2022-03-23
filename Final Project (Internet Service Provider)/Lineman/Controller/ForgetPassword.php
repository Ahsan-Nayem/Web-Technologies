<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
 }
 ?>

<html>
<head>
	<title>Forget Password</title>
</head>
<body>
	<a href="../View/Login.php">Log Out</a> 
	<p> || </p>
	
	<h1 style="text-align:center;" ><u>WELCOME <?php echo $_SESSION['Username']; ?></u></h1>
	
	<?php
 $OTP1=rand(10,1000);
 $_SESSION['OTP1']=$OTP1;
 echo  "OTP is: ";
 echo $OTP1;
  ?>
		<form name="jsform"  action='../Controller/ForgetPasswordAction.php' method= "post" onsubmit="return isValid(this);">
		<fieldset>
	
		<u>New password*</u>: 
		<input type="password" name="Password2">
			<br>
			<br>	
			
		<u>Confirm password*</u>: 
		<input type="password" name="Password3">
			<br>
			<br>
		<u>OTP</u>: 
		<input type="text" name="OTP">
			<br>
			<br>	
		
		
		<input type="submit" name="submit" value="Chnage">
	</form>
	
<p id="msg"></p>
  <script>
    function isValid(jsform)
    {
      
      const Password2= jsform.Password2.value;
      const Password3= jsform.Password3.value;
      if ( Password2 === ""|| Password3 === "") {
        document.getElementById("msg").innerHTML = "Please fill up the form properly";
        return false;
      }
      return true;
    }
  </script>
</body>
</html>


			



