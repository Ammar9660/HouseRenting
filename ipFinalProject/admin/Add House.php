<?php
	require '../config.php';
?>
<html>
<head>
	<title>Add Houses</title>
	<link rel="stylesheet" href="stylesheets/Main.css" type="text/css">
	<link rel="stylesheet" href="stylesheets/Add House.css" type="text/css">
	<script src="../scripts/formCheck.js"></script>
</head>
<body>
<br/>
<center><a href="index.php">&lt;Back</a></center>
<br/>
<div class="login-page">
 	  <div class="form">
 	    <h2>Add House</h2>
 	    <form method="post" name="myForm1" enctype="multipart/form-data" onsubmit="return formValidation();"><br><p id="head" ></p><br>

		<b><label>House Image:</label><font>*</font>
		<input type="file" name="proimage" id="proimage"><br/>
		<p id="p1"></p>

		<label>House Description:</label><font>*</font>
		<textarea placeholder="Description" name='description' maxlenth="1000" cols="34" rows="6" id="description" required></textarea><br/>
		<p id="p2"></p>

		<b><label>Location:</label><font>*</font>
		<input type="text" name="location" placeholder="Location" id="location" required><br/>
		<p id="p1"></p>

		<label>Amount per Day:</label>
		<font>*</font> <input type='text' placeholder="Amount per day" name='amountPerDay' id='amount' required /><br/>
		<p id="p8"></p>

		<input type='submit' id="submit" value='Submit' name='btnSubmit'/>
	    </form>
	  </div>
	</div>
	</body>
</html>
<?php
	if(isset($_POST["btnSubmit"])) {
		$des = $_POST["description"];
		$amount = $_POST["amountPerDay"];
		$location = $_POST["location"];
		
		$file = addslashes(file_get_contents($_FILES["proimage"]["tmp_name"]));  
		$query = "INSERT INTO house(Image,Description,Amount,Location) VALUES ('$file','$des','$amount','$location')";
		if(mysqli_query($conn, $query))
		{
			echo '<script>alert("Image Inserted into Database")</script>';
			header ("Location:index.php");
		}
	}
?>