<!DOCTYPE html>
<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../CONTROLLER/Login.php");
 }
 ?>
<?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Admin Command</title>
	<h1 style="text-align:center;" ><u>Admin Command</u></h1>
</head>
<body>
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	
	<h3 style="text-align:left;" ><a href="../View/Home.php">Back</a></h3>
	<form name="jsform" action="<?php echo htmlspecialchars("../Controller/LINEMAN_BOX_A2.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
	<fieldset>
	<u>User Name</u>: <input type="text" name="USERNAME">
	<br>
	<br>
	<input type="submit" name="submit" value="Action">
	</fieldset>
	</form>
	<p id="msg"></p>
	<script>
		function sendData(formData)
		{
			const USERNAME= jsform.USERNAME.value;
			if (USERNAME === "") {
				document.getElementById("msg").innerHTML = "Please fill up the form properly";
				return false;
			}
			else if(USERNAME.toString().length > 50)
			{
				document.getElementById("msg").innerHTML = "Name characters should be equal or less than 50 characters";
				return false;
			}
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState === 4 && this.status === 200) {
					document.getElementById("msg").innerHTML = this.responseText;
				}
			}
			xhttp.open(formData.method, formData.action);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			const myData = {
				"username" : formData.USERNAME.value
				
			}
			xhttp.send("obj="+JSON.stringify(myData));

		}
	</script>
	
	
	
	</script>
	
	<button type="button" onclick="getData();">Show</button>
	<p id="i1"></p>
	<table border="1">
			<tr>
				 <th>Username</th>
				 <th>Area</th>
				 <th>Customer Message</th>
				 <th>Lineman Message</th>
				 <th>Status</th>
			</tr>
		</th>
		<tbody id="i2"></tbody>
	</table>
	
	<script>
		function getData() {
			const xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {

				if (this.readyState === 4 && this.status === 200) {
					const json = JSON.parse(this.responseText);
					
					let x = "";

					for (let i = 0; i < json.length; i++) {
						x += "<tr>" + 
					"<td>" + json[i].name + "</td>" + 
					"<td>" + json[i].area + "</td>" +
					"<td>" + json[i].customer + "</td>" + 
					"<td>" + json[i].lineman + "</td>" + 
					"<td>" + json[i].status + "</td>" +  
					"</tr>"
					}

					document.getElementById("i2").innerHTML = x;
					console.log(x);
				}
			}
			xhttp.open("GET", "../MODEL/LinemanM.php");
			xhttp.send();
		}
	</script>
	
	
	
	<?php include('../View/FOOTER.html')?>

	
</body>
</html>