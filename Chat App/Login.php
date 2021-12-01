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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
 onsubmit="return isValid(this);"> 
  <br>
  <br>
  Username: <input type="text" name="Username">
  <br>
  <br>
  Password: <input type="text" name="Password">
  <br>
  <br>
  <input type="Submit" name="Submit" value="Submit">
  </form>
  </fieldset>
  <br>
  <br>

  <a href="LOG_IN.php">Back</a>
<br>
<?php
  if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST) > 0) 
    $Username=$password="";
    $isValid = false;
    if (empty($_POST['Username']) or empty($_POST['Password']))
    {
      $isValid = false;
    }
    else
    {
      $isValid = true;
    }
    if ($isValid) 
    {
      
      
      
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "etwo";
    $connection = new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    }
    
      $sql = "SELECT * FROM info WHERE username = ? and password = ?";
      $stmt = $connection->prepare($sql);
      $stmt->bind_param("ss", $Username, $Password);
      $Username = $_POST["Username"];
      $Password=$_POST['Password'];
      $response = $stmt->execute();

      if ($response) {
        $data = $stmt->get_result();
        if ($data->num_rows > 0) {
          while ($row = $data->fetch_assoc()) {
            
            session_start();
            $_SESSION['Username']=$Username;
           
            header("Location:Home.php");
            die();
          }
        }
        else
        {
          
          echo "incorrect";
        }
      }
      else
      {
        echo " failed!!!!!!!!";
      }
      
    }
    else
    {
      echo "Please fill all sections";
    }
  
  ?>
  
  New user?
  <a href="Registration Form.html">Click here</a> for REGISTRATION

  
</body>
</html>

