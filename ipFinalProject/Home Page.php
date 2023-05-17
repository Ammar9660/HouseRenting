<html>
  <head>
	<title>Home Page</title>
	<link rel="stylesheet" href="stylesheets/Main.css"/>
	<link rel="stylesheet" href="stylesheets/Home Page.css">
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <form method="post" action="Home Page.php">
    <div class="header1">
      <div>
        <h1>LankaRentHouse</h1>
      </div>
      <div class="center">
        <input type="text" placeholder="Description or Location" id="city" name="searchParam">
        <input type="Submit" value="Search" id="search" name="search">
      </div>
      <div class="left">
        <a href="Intoduction.php">Home</a>
        <a href="#">profile</a>
        <!-- <h3>profile</h3> -->
      </div>
    </form>
    </div>
    
  </header>
  
	<!-- <table align="center">
		<tr>
			<td width="15%"></td>
			<td width="70%"><h1>LankaRentHouse.com</h1></td>
			<td width="15%" class="td1">
			</td>
		</tr>
		<tr>
			<td width="10%"></td>
			<td class="tr1" align="middle" width="70%"><b>
				<a href="Intoduction.php">Introduction</a>
			</td>
		</tr>
	</table>

	<br/>
	<form method="post" action="Home Page.php">
	<input type="text" placeholder="Description or Location" id="city" name="searchParam">
	<input type="Submit" value="Search" id="search" name="search">
	</form> -->

	<br/><br/><br/>

<?php
require_once 'config.php';

$products = array();

if ( isset($_POST['search']) ) 
{
  $searchParam = $_POST["searchParam"];
  $sql = "SELECT *
          FROM `house`
          WHERE `Description` LIKE '%".$searchParam."%'
			OR `Location` LIKE '%".$searchParam."%'
          ORDER BY `House_id` DESC";

  $res=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_object($res)) {
    $products[] = $row;
  }
}
else
{
  $sql = "SELECT *
          FROM `house`
          ORDER BY `House_id` DESC";
    $res=mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_object($res)) {
    $products[] = $row;
  }
}
?>
<div id="main">
    <header class="container">
      <h3 class="page-header">Store</h3>
    </header>
    <div class="container">
      <div class="row">
        <?php if (count($products) > 0) { ?>
          <?php
            foreach ($products as $product) {
          ?>
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <?php
			  echo '<img src="data:image/jpeg;base64,'.base64_encode($product->Image ).'" height="330px" width="330px"/>'
			  ?>
              <div class="caption">
                <h4 class="text-center"><?php echo $product->Description ?></h4>
				<h6 class="text-center"><?php echo $product->Location ?></h6>
				<h6 class="text-center"><?php echo $product->Amount ?>/per day</h6>
                <!-- <p><?php echo $product->Description ?  $product->Description : '<span class="text-muted">No description</span>'; ?></p>
                 --><!--<p><a href="product.php?id=<?php echo $product->pd_id; ?>" class="btn btn-default">View</a> <a href="cart.php?add=<?php echo $product->pd_id; ?>" class="btn btn-primary">Add to cart</a></p> -->
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        <?php 
        }
        else
        {
        ?>
        <div class="alert alert-info"><strong>Oh no!</strong> No products found!</div>
        <?php
        } 
        ?>
      </div>
    </div>
  </div>
</body>
<html>