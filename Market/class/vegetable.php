<?php
require_once('../connection.php');
class vegetable 
{
	function getAll(){
		$sql="SELECT * FROM `vegetable`";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}

	function getListByCateID($cateid){
		$sql="SELECT * FROM `vegetable` WHERE CategoryID = '$cateid'";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}
	
	function getListByCateIDs($cateids){
		$arr = array();
		$kt = new csdl();
		$link=$kt->connect();
     	foreach ($cateids as $cateid) {
     		$sql = "SELECT * FROM vegetable WHERE CategoryID in ($cateid)";
     		$query = mysql_query($sql,$link);
        	while ($row = mysql_fetch_assoc($query)) {
            	$arr[] = $row;
        	}
    	}
    	return $arr;
    }
   
	function getByID($vegetableID){
		$sql="SELECT * FROM `vegetable` WHERE VegetableID = '$vegetableID' LIMIT 1";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}

	
	function add($categoryID, $vegetableName, $unit, $amount, $image, $price){
		$k= new csdl();
		$link=$k->connect();
		$sql=  "INSERT INTO `vegetable` (`VegetableID` ,`CategoryID` ,`VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES ('' , '$categoryID,', '$vegetablename', '$unit','$amount','$name','$price')";
		$query=mysql_query($sql,$link);
        if($query==1){
            echo "<script type='text/javascript'>alert('Them thanh cong'); location.replace('../category/index.php');</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Them that bai'); location.replace('../category/index.php');</script>";
        }
	}

}

?>