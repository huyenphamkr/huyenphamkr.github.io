<?php
require_once('../connection.php');

class category 
{
	function getAll(){

		$sql="SELECT * FROM `category`";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}
	function add($name,$description){
		$kt = new csdl();
		$link=$kt->connect();
		$sql= "INSERT INTO `category` (`CategoryID` ,`Name` ,`Description`) VALUES ('' , '$name', '$description')";
		$query=mysql_query($sql,$link);
        if($query==1){
            echo "<script type='text/javascript'>alert('Them thanh cong'); location.replace('../category/index.php');</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Them that bai'); location.replace('../category/index.php');</script>";
        }
	}
	function getID($name){
		$sql="SELECT * FROM `category` WHERE Name = '$name'";
		$k = new csdl();
		$link=$k->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}
}
?>