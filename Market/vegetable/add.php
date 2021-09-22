<?php
include('../class/vegetable.php');
if($_POST['VegetableName']!='' && $_POST['Unit']!='' && $_POST['Amount']!='' && $_POST['Price']!='' && $_POST['CategoryName']!='')
{
    $vegetablename=$_POST['VegetableName'];
	$unit = $_POST['Unit'];
	$amount = $_POST['Amount'];
	$price = $_POST['Price'];
	$categoryName = $_POST['CategoryName'];
	$sql="SELECT * FROM `category` WHERE Name = '$categoryName'";
		$con = new csdl();
		$link=$con->connect();
		$ketqua = mysql_query($sql,$link);
	while ($row = mysql_fetch_array($ketqua)){
		$categoryID = $row['CategoryID'];
	}
	$name=$_FILES['Image']['name'];    
    $type=$_FILES['Image']['type'];
    $size=$_FILES['Image']['size'];
    $local=$_FILES['Image']['tmp_name'];
    $folder="images";
    $newname="../".$folder."/".$name;
    $r=pathinfo($name,PATHINFO_FILENAME);
    $e=pathinfo($name,PATHINFO_EXTENSION);
    if($e=='jpg' || $e=='png'){
      	if($size<=2000000){
	    	move_uploaded_file($local,$newname);
			$sql2= "INSERT INTO `vegetable` (`VegetableID` ,`CategoryID` ,`VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES ('' , '$categoryID,', '$vegetablename', '$unit','$amount','$name','$price')";
			$query=mysql_query($sql2,$link);
        	if($query==1){ echo "<script type='text/javascript'>alert('Them thanh cong'); location.replace('../vegetable/new.php');</script>";}
        	else{ echo "<script type='text/javascript'>alert('Them that bai'); location.replace('../vegetable/new.php');</script>";}
		}
		else{echo "file anh khong >2MB";}
    }
    else { echo " ảnh phải là .jpg hoặc .png";}
}
?>