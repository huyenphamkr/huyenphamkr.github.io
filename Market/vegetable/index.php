<?php
session_start();
require_once('../class/category.php');
require_once('../class/vegetable.php');
require_once('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vegetable</title>
</head>
<body>
  <div id="main">
      <div id="main_left">
        <h4>Category Name:</h4>
        <form action="" method="get">
          <?php
          $category = new category();
          $kq = $category->getAll();
          while ($r = mysql_fetch_array($kq))
          {                
          ?>
          <input type="checkbox" id="checkbox<?php echo $r['CategoryID'];?>" name="checkbox[]" value="<?php echo $r['CategoryID'];?>">
          <label for="checkbox<?php echo $r['CategoryID'];?>"><?php echo $r['Name'];?></label><br>          
          <?php }?>
          <input type="submit" class="submit" name="nut" value="Filter"> 
      </form>
      </div>
    <div id="main_right">
        <h3>Vegetable</h3>
      <div class="row">
        <?php
          if(isset($_GET['checkbox']))
          {
              $checked =array();
              $checked = $_GET['checkbox'];        
              foreach($checked as $id){
                $products = "SELECT * FROM vegetable WHERE CategoryID in ($id)";
                $kt = new csdl();
                $link=$kt->connect();
                $products_run = mysql_query($products,$link);
                if(mysql_num_rows($products_run) > 0)
                {
                   while ($row = mysql_fetch_array($products_run))
                  {?>
         <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="../images/<?php echo $row['Image'];?>" class="card-img img-fluid" width="160" height="160" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                  <div class="mb-2">
                      <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true"><?php echo $row['VegetableName'];?></a> </h6>
                  </div>
                  <h3 class="mb-0 font-weight-semibold"><?php echo $row['Price'];?></h3>
                  <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                  <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i><a href="../cart/index.php?VegetableID=<?php echo $row['VegetableID'];?>">Buy</button>
                </div>
            </div>
    </div>
    <?php
  }
     }
      }
        }
       else
     {
        $vegetable = new vegetable();
        $ketqua = $vegetable->getAll();
        while ($row = mysql_fetch_array($ketqua)){
        ?>
      <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="../images/<?php echo $row['Image'];?>" class="card-img img-fluid" width="160" height="160" alt=""> </div>
                  </div>
                <div class="card-body bg-light text-center">
                  <div class="mb-2">
                      <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true"><?php echo $row['VegetableName'];?></a> </h6>
                  </div>
                  <h3 class="mb-0 font-weight-semibold"><?php echo $row['Price'];?></h3>
                  <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                  <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i><a href="../cart/index.php?VegetableID=<?php echo $row['VegetableID'];?>">Buy</button>
                </div>
            </div>
    </div>
        <?php
         }
       }
         ?>
      </div>
    </div>
    </div>
</body>
</html>