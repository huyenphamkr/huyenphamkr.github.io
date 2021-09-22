<?php
session_start();
include('../class/vegetable.php');
$orderid=$_SESSION['OrderID'];
$sql="SELECT * FROM `orderdetail` WHERE OrderID = '$orderid'";
$kt = new csdl();
$link=$kt->connect();
$ketquaODID = mysql_query($sql,$link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>History</title>
</head>
<body>
	<div id="main">    	
    <div class="box-header">
      <h3 class="box-title">History</h3>
    </div>
    <div class="box-body">
      <table id="example1" class="table table-bordered">
        <thead>
         	<tr>
         		<th>#</th>
         		<th>Name</th>
         		<th>Image</th>
         		<th>Amout</th>
        		<th>Price</th>
         	</tr>
        </thead>
        <?php
		  		while ($row = mysql_fetch_array($ketquaODID)){
					 $vegetable = new vegetable ();
					 $kqDT=$vegetable->getByID($row['VegetableID']);
					 while ($r = mysql_fetch_array($kqDT)){
						$amout+=$row['Quantity'];
						$total+=($row['Price']*$row['Quantity']);
        ?>
        <tbody>
         	<tr>
         		<td><?php echo $r['VegetableID'];?></td>
         		<td><?php echo $r['VegetableName'];?></td>
         		<td><?php echo '<img src="../images/'.$r['Image'].'" width="70" height="85">';?></td>
         		<td><?php echo $row['Quantity'];?></td>
         		<td><?php echo $row['Price'];?></td>
         	</tr>       
        </tbody>
        <?php 	} } ?>
        <tfoot>
         	<tr>
        		<th></th>
         		<th></th>
         		<th>Total:</th>
         		<th><?php echo $amout;?></th>
         		<th><?php echo $total;?></th>
         	</tr>
        </tfoot>                
      </table>
    </div>    	
</body>
</html>