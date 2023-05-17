<html>
<head>
<title>Update</title>
<link rel="stylesheet" href="stylesheets/Main.css" type="text/css">
<link rel="stylesheet" href="stylesheets/Add House.css" type="text/css">
</head>
<?php

require '../config.php';
	
if(isset($_GET['id'])){
	$id=$_GET['id'];

$sql = "SELECT * FROM house WHERE House_id=$id";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	?>
	<center><a href="index.php">&lt;Back</a></center>
	<div class="login-page">
	<div class="form">
	<form method="post" action="Update.php?id=<?php echo $id; ?>">

		<h2>Update House</h2>
		
		<b><label>Description:</label></b><br/>
			<textarea name="description" maxlenth="1000" cols="35" rows="6"><?php echo $row['Description']; ?></textarea>
		<br/><br/>

		<b><label>Location:</label></b><br/>
			<input type="text" name="location" value="<?php echo $row['Location']; ?>">
		
		<b><label>Amount:</label></b><br/>
			<input type="text" name="amountPerDay" value="<?php echo $row['Amount']; ?>">
		<br/><br/>
		
		<input type="submit" value="Update" name="btnUpdate" class="button">
		
	</form>
	</div>
	</div>
<?php }}}?>
<?php
	if(isset($_POST["btnUpdate"])) { //check if the user pressed on the submit button
		$des = $_POST["description"];
		$amount = $_POST["amountPerDay"];
		$location = $_POST["location"];
		
		$id = $_GET['id'];
		
		$sql = "UPDATE house SET
					Description = '$des',
					Amount = '$amount',
					Location = '$location'
				WHERE House_id=$id;";
				
		if(mysqli_query($conn,$sql)) {
			echo "Update Successfully";
			header ("Location:index.php");
		}
		else{
			echo "Error".$conn->error;
		}			
	}
?>