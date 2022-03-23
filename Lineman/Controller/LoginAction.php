<?php include "../Model/FUNCTION.php"?>
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
    
      $sql = "SELECT * FROM user_info WHERE username = ? and password = ?";
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
      $_SESSION['Password']=$Password;
      header("Location:../View/Home.php");
      die();
          }
        }
        else
        {
          
          echo "Incorrect Username or Password";
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
  