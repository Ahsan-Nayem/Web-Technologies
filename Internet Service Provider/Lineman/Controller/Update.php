<!DOCTYPE html>

<?php
 session_start();
 if(count($_SESSION)===0)
 {
	header("Location:../Controller/Login.php");
 }
 ?>
 <?php include "../Model/FUNCTION.php"?>
<?php include('../View/HEADER.html')?>
<html>
<head>
	<meta charset="utf-8">
	<title style="text-align:center;">Update Profile</title>
	<h1 style="text-align:center;" ><u>Update Profile</u></h1>
</head>
<body>
	<h3 style="text-align:right;" >User: <?php echo $_SESSION['Username']; ?></h3>
	
	<h3 style="text-align:left;" ><a href="../View/Profile.php">Back</a></h3>
	
		<button type="button" onclick="getData();">Show Profile details</button>
	<p id="i1"></p>
	<table border="1">
			<tr>
				<th>Firstname</th>
				  <th>Lastname</th>
				 <th>Gender</th>
				 <th>Date of Birth</th>
				 <th>Religion</th>
				 <th>PresentAddress</th>
				 <th>PermanentAddress</th>
				 <th>Phone</th>
				 <th>Email</th>
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
					"<td>" + json[i].Firstname + "</td>" + 
					"<td>" + json[i].Lastname + "</td>" +
					"<td>" + json[i].Gender + "</td>" + 
					"<td>" + json[i].Dob + "</td>" + 
					"<td>" + json[i].Religion + "</td>" +  
					"<td>" + json[i].PresentAddress + "</td>" + 
					"<td>" + json[i].PermanentAddress + "</td>" +
					"<td>" + json[i].Phone + "</td>" + 
					"<td>" + json[i].Email + "</td>" + 
					"</tr>"
					}

					document.getElementById("i2").innerHTML = x;
					console.log(x);
				}
			}
			xhttp.open("GET", "../MODEL/UpdateM.php");
			xhttp.send();
		}
	</script>
	
		 <br>
		 <br>
		 
	
		
			
			<form name="jsform" action="<?php echo htmlspecialchars("../Controller/UpdateAction.php"); ?>" method="POST" onsubmit="sendData(this); return false;">
		<fieldset>
		<legend>Basic information </legend>
		
			First Name: <input type="text" name="Firstname">
			<br>
			<br>
			Last Name: <input type="text" name="Lastname">
			<br>
			<br>

			Gender: 

			<input type="radio" name="Gender" value="Male">Male
			<input type="radio" name="Gender" value="Female">Female
			<input type="radio" name="Gender" value="Other">Other
			<br>
			<br>
			
			Dob:
			<input type="date"  name="Dob">
			<br>
			<br>
			Religion: 
			<select name="Religion">
				<option value="">select a value</option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christianity">Christianity</option>
				<option value="Others">Others</option>
			</select>

			<br>
			<br>			
		</fieldset>
		<fieldset>
		<legend>Contact Information</legend>
		Present Address: 
		<textarea  name="PresentAddress"></textarea>
		<br>
		<br>
		Permanent Address: 
		<textarea  name="PermanentAddress"></textarea>
		<br>
		<br>
		Phone:
		<input type="tel" id="Phone" name="Phone" >
		<br>
		<br>
		Email:
		<input type="Email" id="Email" name="Email">
		
		<br>
		<br>
		
		</fieldset>
		<br><br>
		
		
		<input type="submit" name="submit" value="Update">
<br><br>
	</form>

	 <p id="msg"></p>
	<script>
		function sendData(formData) 
		{
			const NAME= jsform.Firstname.value;
			const NAME1= jsform.Lastname.value;
			const GENDER= jsform.Gender.value;
			const DATE= jsform.Dob.value;
			const RELIGION= jsform.Religion.value;
			const ADDRESS= jsform.PresentAddress.value;
			const ADDRESS1= jsform.PermanentAddress.value;
			const PHONE= jsform.Phone.value;
			const EMAIL= jsform.Email.value;
			if ( NAME === "" || NAME1 === "" || GENDER === "" || DATE === "" ||
				RELIGION === "select a value" || PHONE === "" || EMAIL === "") 
			{
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
				"Firstname" : formData.Firstname.value,
				"Lastname" : formData.Lastname.value,
				"Gender" : formData.Gender.value,
				"Dob" : formData.Dob.value,
				"Religion" : formData.Religion.value,
				"PresentAddress" : formData.PresentAddress.value,
				"PermanentAddress" : formData.PermanentAddress.value,
				"Phone" : formData.Phone.value,
				"Email" : formData.Email.value
			}
			xhttp.send("obj="+JSON.stringify(myData));
			
		}
	</script>
<?php include('../View/FOOTER.html')?>
</body>
</html>