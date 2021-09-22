<?php
include('../connection.php');
$dp = new csdl();
session_start();
$id =  !empty($_GET['VegetableID']) ? (Int)$_GET['VegetableID'] : 0;
$quantity =  !empty($_GET['quantity']) ? (Int)$_GET['quantity'] : 1;
$action =  !empty($_GET['action']) ? (Int)$_GET['action'] : 'buy';
//lay thong tin san pham
$sql="SELECT * FROM `vegetable` WHERE VegetableID = '$id'";
$kt = new csdl();
$link=$kt->connect();
$ketqua = mysql_query($sql,$link);
$pro = mysql_fetch_object($ketqua);
if($pro && $action=='buy')
{
  if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['quantity'] += $quantity;
    //kiem tra số lượng mua có vượt quá số lượng của sản phẩm
    if($_SESSION['cart'][$id]['quantity']>$pro->Amount)
    {   
       $_SESSION['cart'][$id]['quantity'] -=1;
    }
  }
  else{
    $item = array(
      'id' => $pro->VegetableID,
      'name' => $pro->VegetableName,
      'image' => $pro->Image,
      'quantity' => $quantity,
      'price' => $pro->Price
    );
    $_SESSION['cart'][$id]=$item;
  }
}
$products=$_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
</head>
<body>
  <div id="main">     
        <div class="box-header">
              <h3 class="box-title">Cart</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Picture</th>
                      <th>Amout</th>
                      <th>Price</th>
                  </tr>
                </thead>
               <tbody>
                <?php $n=1;  $sl=0; $t=0;
                  foreach($products as $item) : 
                  $sl += $item['quantity'];
                  $t += ($item['quantity']*$item['price']);
                ?>
                  <tr>
                      <td><?php echo $n?></td>
                      <td><?php echo $item['name'];?></td>
                      <td><?php echo '<img src="../images/'.$item['image'].'" width="70" height="85">';?></td>
                      <td><?php echo $item['quantity'];?></td>
                      <td><?php echo $item['price'];?></td>                      
                  </tr>     
                  <?php $n++; endforeach; ?>  
                </tbody> 
                     <?php
                     $_SESSION['Total']=$t;
                      ?>          
                <tfoot>
                  <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><?php echo $sl?></th>
                      <th><?php echo $t?></th>
                  </tr>
                </tfoot>                
              </table>
              <td><form action="saveorder.php" method="get">
                  <input type="submit" class="submit" name="nut" value="Order">
                  </form>
               </td>
        </div>      
</body>
</html>