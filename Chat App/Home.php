<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <script src="js/signup-action.js"></script>


<html>
<head>
	<title>Chat </title>
</head>
<body>
	<h1 >Chat </h1>
	<form action="Home Action.php" method="post" onsubmit="sendData1(this); return false;">
			<br>
			<br>
	
	To:
	<select name="TO">
    <option value="none">Select a value</option>
	<option value="none">Select a Value</option>
	<option value="Tamim">Send Money</option>
	<option value="Akhirul">Mobile Recharge</option>
	<option value="Mukul">Cash Out</option>
 
  </select>
  
  
	Message:
	<input type="text" name="Message">
	<br>
	<br>
		
	<input type="submit" name="submit" value="send">
	</form>
	
	
</body>
</html>