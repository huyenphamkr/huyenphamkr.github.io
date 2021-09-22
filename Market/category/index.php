<?php
include('../class/category.php');
$category  = new category();
$ketqua = $category ->getAll(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Category</title>
</head>
<body>
	<div id="main">
    	<div id="main_left">
    		<form enctype="multipart/form-data" action="./add.php" method="post">
  				<div class="form-group">
    				<label for="formGroupExampleInput">Name</label>
    				<input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="">
  				</div>
  				<div class="form-group">
    				<label for="formGroupExampleInput2">Description</label>
    				<input type="text" name="description" class="form-control" id="formGroupExampleInput2" placeholder="">
  				</div>
  				<button type="submit" name="nut" class="btn btn-primary" value="add">Add</button>
			</form>
    	</div>
    	<div id="main_right">
    		<div class="box-header">
              <h3 class="box-title">Category</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                	<tr>
                  		<th>#</th>
                  		<th>Name</th>
                  		<th>Description</th>
                	</tr>
                </thead>
                <?php
				while ($row = mysql_fetch_array($ketqua)){
				?>
                <tbody>
                	<tr>
                  		<td><?php echo $row['CategoryID'];?></td>
                  		<td><?php echo $row['Name'];?></td>
                  		<td><?php echo $row['Description'];?></td>
                	</tr>       
                </tbody>
                <?php } ?>
              </table>
            </div>
    	</div>
</body>
</html>