<!DOCTYPE html>
<?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title>Request</title>
	</head>
	<body>
<a href="../View/Home.php">HOME</a>
<form name="jsform" action="<?php echo htmlspecialchars("../Controller/RequestA.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
	<h1>	Request To Manager </h1>
            <br>
			<br>
			
			Employee id:
			<input type ="text" name="Employeeid">
			<br>
			<br>
			Request Type: 
			<select name="Request">
				<option value="">select a value</option>
				<option value="Salary">Salary</option>
				<option value="Want to Leave">Leave</option>
				<option value="Vacation">Vacation</option>
				<option value="Others">Others</option>
			</select>

			<br>
			<br>	
            Details: 
		<textarea  name="Details"></textarea>
	
			<br>
			<br>
			<input type="submit" name="submit" value="submit">

     </form>
	 
	   <p id="msg"></p>
  <script>
  	function sendData(formData) 
    {
      const Employeeid= jsform.Employeeid.value;
      const Request= jsform.Request.value;
       const Details= jsform.Details.value;
      if (Employeeid === "" || Request === ""|| Details === "") {
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
				 "Employeeid" : formData.Employeeid.value,
				  "Request" : formData.Request.value,
				  "Details" : formData.Details.value
			}
			xhttp.send("obj="+JSON.stringify(myData));

    }
  </script>
	


</body>
</html>
<?php include('../View/FOOTER.html')?>