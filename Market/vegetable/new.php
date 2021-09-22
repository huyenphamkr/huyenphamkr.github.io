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
	<title>Document</title>
</head>
<body>
	<div id="main">		
		<form enctype="multipart/form-data" action="./add.php" method="post">
			<h4 >Add Vegetable</h4>
     	<div id="left">    		
		  <div class="form-group">
    		<label for="inputVegetableName">Vegetable Name</label>
    		<input type="text" class="form-control" name="VegetableName" id="inputVegetableName" placeholder="">
  		</div>	
  		<div class="form-row">
    		<div class="form-group col-md-6">
      			<label for="inputUnit">Unit</label>
      			<select name="Unit" id="inputUnit" class="form-control">
        			<option selected>Kg</option>
        			<option>Gam</option>
      			</select>
    		</div>
    		<div class="form-group col-md-6">
      			<label for="inputAmount">Amount</label>
      			<input name="Amount" type="text" class="form-control" id="inputAmount" placeholder="">
    		</div>
  		</div>  		
  		<div class="form-group">
    		<label for="inputImage">Image:</label>
    		<input name="Image" type="file" class="form-control" id="inputImage" >
  		</div>
  		<button type="submit" class="btn btn-primary">Add</button>
	   </div>
	   <div id="right">
  			<div class="form-group">
    			<label for="CategoryName">Category Name</label>
      			<select name="CategoryName" id="inputCategoryName" class="form-control">
      				<?php
					while ($row = mysql_fetch_array($ketqua)){
					?>
        			<option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option><?php
					}
					?>
      			</select>      			
  			</div>
  			<div class="form-group">
    			<label for="Price">Price</label>
    			<input name="Price" type="text" name="Description" class="form-control" id="Price" placeholder="">
  			</div>
		
	</div>
</form>
</div>
</body>
</html>