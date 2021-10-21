<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>

	<h1>Login Page</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
		Username: <input type="text" name="Username">

		<br><br>

		Password: <input type="password" name="Password">

		<br><br>

		<input type="submit" name="submit" value="submit">
	</form>
        <br>

<?php

  
 $isValid=false;
if(empty($_POST['Username']) or empty($_POST['Password'])) 
{
$isValid=false;
echo"Requirred";
  echo"<br>";
 }
 else{
  $isValid=true;
 }
 ?>
  
  <?php
      $handle2 = fopen("information.json", "r");
      $data = fread($handle2,filesize("information.json"));
     
     
  ?>
  
  
  <?php
      $explode  = explode("\n",$data);
      array_pop($explode);
      //var_dump($explode);
  ?>
  <hr>
  <?php
      $arr1 = array(); 
      for ($i = 0; $i < count($explode); $i++) {
      $json = json_decode($explode[$i]); 
      array_push($arr1, $json);
      }
      //var_dump($arr1);
  ?>
  
  <?php 
  if($_SERVER['REQUEST_METHOD'] === "GET" and count($_REQUEST) > 0) 
    { $flag = false;
    for ($k = 0; $k < count($arr1); $k++)
      { if ($_GET['Username'] === $arr1[$k]->Username and $_GET['Password'] === $arr1[$k]->Password ) 
      { $flag = true;
    }
  }
      if ($flag) {
      header("Location:Home.php");
      die();
      }
      else {
      echo "Not found";
      
      }
    }
  ?>

</body>
</html>