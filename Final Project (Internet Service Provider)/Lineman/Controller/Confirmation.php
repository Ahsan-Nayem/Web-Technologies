<!DOCTYPE html>
<?php include('../View/HEADER.html')?>
<?php include "../Model/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title>Confirmation</title>
	</head>
	<body>
		<a href="../View/Home.php">HOME</a>
<form name="jsform" action="<?php echo htmlspecialchars("../Controller/ConfirmationA.php"); ?>" method="POST" onsubmit="sendData(this); return false;">

	<h1>	Send confirmation </h1>
            <br>
			<br>
			
			User id:
			<input type ="text" name="Userid">
			<br>
			<br>
			Problem: 
			<select name="Problem">
				<option value="">select a value</option>
				<option value="NewConnection">New Connection</option>
				<option value="DisconnectConnection">Disconnect Connection</option>
				<option value="Troubleshoot">Troubleshoot</option>
				<option value="Others">Others</option>
			</select>

			<br>
			<br>	
            Status: 
			<select name="Status">
				<option value="">select a value</option>
				<option value="Solved">Solved</option>
				<option value="Can'tSolve">Can'tSolve</option>
				
			</select>

			<br>
			<br>
			<input type="submit" name="submit" value="submit">

     </form>

     <p id="msg"></p>
  <script>
  	function sendData(formData) 
    {
      const Userid= jsform.Userid.value;
      const Problem= jsform.Problem.value;
       const Status= jsform.Status.value;
      if (Userid === "" || Problem === ""|| Status === "") {
        document.getElementById("msg").innerHTML = "Please fill up the form properly";
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
				 "Userid" : formData.Userid.value,
				  "Problem" : formData.Problem.value,
				  "Status" : formData.Status.value
			}
			xhttp.send("obj="+JSON.stringify(myData));

    }
  </script>


</body>
</html>
<?php include('../View/FOOTER.html')?>