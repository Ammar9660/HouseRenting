<?php
	require '../config.php';
?>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" href="stylesheets/Main2.css" type="text/css">
</head>
<body>
<a href="../Home Page.php" >&lt;&lt;Back to site</a><br><br><br>
<a href="Add House.php">+Add House</a><br><br><br>
<table border=0>
<tr width="100%">
	<th width="25%">House Image</th>
	<th width="30%">House Description</th>
	<th width="15%">Location</th>
	<th width="10%">Amount per Day</th>
	<th width="10%">Update</th>
	<th width="10%">Delete</th>
</tr>
<?php
	$query = "SELECT * FROM house ORDER BY Amount ASC";  
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)) 
	{
		echo '
		<tr>
			<td>  
				<img src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="200" width="200" class="img-thumnail" />
			</td>
		';?>
		<td><?php echo $row['Description']?></td>
		<td><?php echo $row['Location']?></td>
		<td><?php echo $row['Amount'].'.00'?></td>
		<td><a href="Update.php?id=<?php echo $row['House_id'];?>">Update</a></td>
		<td><a href="index.php?delete_id=<?php echo $row['House_id'];?>">Delete</a></td></tr><?php
	}?>
</table>
</body>
</html>
<?php
	if(isset($_GET["delete_id"])) {
		$deleteId = $_GET["delete_id"];
		$sql = "DELETE FROM house WHERE House_id=$deleteId";
		
		if(mysqli_query($conn,$sql)) {
			echo "Deleted Successfully";
		}
		else{
			echo "Error: ".$conn->error;
		}
	}
?>