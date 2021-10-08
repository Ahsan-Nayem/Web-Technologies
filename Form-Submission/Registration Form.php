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
if(!empty($_POST['Present Address']))
  {
    echo "Present Address: ";
    echo"<th>".$_POST['Present Address']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['Permanent Address']))
  {
    echo "Permanent Address: ";
    echo"<th>".$_POST['Permanent Address']."</th>";
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
if(!empty($_POST['Personal Website']))
  {
    echo "Personal Website: ";
    echo"<th>".$_POST['Personal Website']."</th>";
    echo"<br>";
  }
  else
  {
    echo"Empty";
    echo"<br>";
}

if(!empty($_POST['username']))
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

</body>
</html>