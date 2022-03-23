<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOG IN FORM</title>
</head>
  <h1 style="text-align:center;"><u>LOG IN FORM</u></h1>  
 <body>
  </fieldset>
  <fieldset>
  <legend>Log In </legend>
  <form name="jsform"  action='../Controller/LoginAction.php' method= "post" onsubmit="return isValid(this);">
  <br>
  <br>
  Username: <input type="text" name="Username">
  <br>
  <br>
  Password: <input type="text" name="Password">
  <br>
  <br>
  <a href="../Controller/FORGET_PASSWORD_A.php<?php  ?>">Forget Password ?</a>
  <br>
  <br>
  <input type="Submit" name="Submit" value="Log in">
  </form>
  </fieldset>
  <br>
  <br>
<p id="msg"></p>
  <script>
    function isValid(jsform)
    {
      const USERNAME= jsform.Username.value;
      const PASSWORD= jsform.Password.value;
      if (USERNAME === "" || PASSWORD === "") {
        document.getElementById("msg").innerHTML = "Please fill up the form properly";
        return false;
      }
      return true;
    }
  </script>
<br>

  New user?
  <a href='../View/Registration Form.html'>Click here</a> for REGISTRATION

  
</body>
</html>