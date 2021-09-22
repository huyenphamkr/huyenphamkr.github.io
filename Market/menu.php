<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="topmenu">
      <a class="active_n" href="./index.php">Maket online</a>
      <a href="./vegetable/index.php">Vegetable</a>
      <a href="./cart/index.php">Cart</a>
      <?php 
      if($_SESSION['FullName']==true)
       { 
          echo '<a href="./cart/history.php">History</a>
                <a href="./customer/logout.php"> Logout </a>
                <a class="active" href="#">'.$_SESSION['FullName'].'</a>';
        }
      else
      {
          echo '<a href="./customer/login.php">Login</a>';
      }
      ?>
      
  </div>
</body>
</html>