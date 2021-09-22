<?php
session_start();
include('../class/order.php');
$cusID=$_SESSION['CustomerID'];
if(isset($_SESSION['CustomerID'])) 
{
	$order  = new order();
	$ketqua = $order ->getAllOrder($cusID); 
}
else
{
	header ('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/><meta charset="UTF-8"><link rel="stylesheet" type="text/css" href="../css/style.css"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>History</title>
</head>
<body>
	<div id="main">    	
    		<div class="box-header"><h3 class="box-title">History</h3></div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                	<tr>
                  		<th>#</th>
                  		<th>Date</th>
                  		<th>Total</th>
                  		<th>Detail</th>
                	</tr>
                </thead>
                <?php $n=1;
				          while ($row = mysql_fetch_array($ketqua)){
					         $id=$row['OrderID'];
					         session_start();
					         $_SESSION['OrderID']=$id;
                 ?>
                <tbody>
                	<tr>
                  	<td><?php echo $n;?></td>
                  	<td><?php echo $row['Date'];?></td>
                  	<td><?php echo $row['Total'];?></td>
                  	<td><form action="detail.php" method="get">
                  	   	<input type="submit" class="submit" name="nut" value="Detail">
                       </form>
                    </td>
                	</tr>       
                </tbody>
                <?php $n++;} ?>
            </table>
      </div> 	
</body>
</html>