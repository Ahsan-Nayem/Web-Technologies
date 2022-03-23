<!DOCTYPE html>
<?php include('../View/HEADER.html')?>
<?php include "../Model/FUNCTION.php"?>
<html>
<head>
	<meta charset="utf-8">
	<title>Equipment</title>
	</head>
	<body>
		<a href="../View/Home.php">HOME</a>
<form name="jsform" action="<?php echo htmlspecialchars("../Controller/EquipmentA.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
	<h1>	Equipment Request </h1>
            <br>
			<br>
			
			Employee id:
			<input type ="text" name="Employeeid">
			<br>
			<br>
			Equipment: 
			<select name="Equipment">
				<option value="">select a value</option>
				<option value="InternetCable">Internet Cable</option>
				<option value="TelephoneCable">Telephone Cable</option>
				<option value="Rouder">Rouder</option>
				<option value="PhoneFilter">Phone Filter</option>
				<option value="ADSLSplitter">ADSL Splitter</option>
			</select>

			<br>
			<br>	
            
            Amount:
			<input type ="text" name="Amount">
			<br>
			<br>
			
			<input type="submit" name="submit" value="submit">

     </form>
	 
	  <p id="msg"></p>
  <script>
  	function sendData(formData) 
    {
      const Employeeid= jsform.Employeeid.value;
      const Equipment= jsform.Equipment.value;
       const Amount= jsform.Amount.value;
      if (Employeeid === "" || Equipment === ""|| Amount === "") {
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
				  "Equipment" : formData.Equipment.value,
				  "Amount" : formData.Amount.value
			}
			xhttp.send("obj="+JSON.stringify(myData));

    }
  </script>
	 
 </body>
 </html>
 <?php include('../View/FOOTER.html')?>