<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
 
<?php
  echo "<br>";
  echo "<br>";
  if(!empty($_POST['firstname']))
  {
    echo "Firstname: ";
    echo"<th>".$_POST['firstname']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['lastname']))
  {
    echo "Lastname: ";
    echo"<th>".$_POST['lastname']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['gender']))
  {
    echo "Gender: ";
    echo"<th>".$_POST['gender']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['Dob']))
  {
    echo "DoB: ";
    echo"<th>".$_POST['Dob']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['Religion']))
  {
    echo "Religion: ";
    echo"<th>".$_POST['Religion']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['PresentAddress']))
  {
    echo "Present Address: ";
    echo"<th>".$_POST['PresentAddress']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['PermanentAddress']))
  {
    echo "Permanent Address: ";
    echo"<th>".$_POST['PermanentAddress']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['phone']))
  {
    echo "Phone: ";
    echo"<th>".$_POST['phone']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['Email']))
  {
    echo "Email: ";
    echo"<th>".$_POST['Email']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}
if(!empty($_POST['PersonalWebsite']))
  {
    echo "Personal Website: ";
    echo"<th>".$_POST['PersonalWebsite']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['Username']))
  {
    echo "Username: ";
    echo"<th>".$_POST['Username']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['Password']))
  {
    echo "Password: ";
    echo"<th>".$_POST['Password']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

?>

 <?php

  
 $isValid=false;
if(empty($_POST['firstname']) or empty($_POST['lastname'])or empty($_POST['gender'])or empty($_POST['Dob'])or empty($_POST['Email'])or empty($_POST['Religion'])or empty($_POST['Username'])or empty($_POST['Password'])){
$isValid=false;
echo"First Name/Last Name/Gender/Dob/Religion/Email/Username/Password is requirred";
  echo"<br>";
 }
 else{
  $isValid=true;
 }
 ?>

 <?php
    if ($isValid) { 
      $handle1 = fopen("information.json", "a");
      $arr1 = array('firstname' => $_POST['firstname'], 'lastname' => $_POST['lastname'],'gender' => $_POST['gender'],'Dob' => $_POST['Dob'],'Religion' =>$_POST['Religion']
      ,'Present Address' => $_POST['PresentAddress'],'Permanent Address' => $_POST['PermanentAddress'], 'phone' =>  $_POST['phone'], 'Email' => $_POST['Email'],
      'Personal Website' =>  $_POST['PersonalWebsite'], 'Username' => $_POST['Username'], 'Password' =>$_POST['Password']);
      $encode = json_encode($arr1);
      
     
      
        $res = fwrite($handle1, $encode . "\n");
        echo "Information saved successully.";
        echo "<br>";
      
    }
    else
    {
      echo "Error while saving.";
      echo "<br>";
    }
    
  ?>
Already Registered? <a href="Login.php">Click here</a> for login.
</body>
</html>