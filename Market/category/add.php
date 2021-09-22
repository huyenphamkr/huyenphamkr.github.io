<?php
include('../class/category.php');
$category  = new category(); 
if(isset($_POST['name']) && isset($_POST['description'])){
    $name=$_POST['name'];
	$description = $_POST['description'];
	$category->add($name,$description);
}
else
{
	echo 'Chưa nhập đủ thông tin';
}
?>