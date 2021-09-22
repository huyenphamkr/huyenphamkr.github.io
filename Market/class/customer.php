<?php
include ('../connection.php');
class customer 
{
	function getByID($cusid){
		$sql="SELECT * FROM `customers` WHERE CustomerID = '$cusid' LIMIT 1";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}
	function add($password, $fullName, $address, $city){
		$kt = new csdl();
		$link=$kt->connect();
		$sql= "INSERT INTO `customers` (`CustomerID` ,`Password` ,`FullName`, `Address`, `City`) VALUES ('' , '$password', '$fullName', '$address', '$city')";
		$query=mysql_query($sql,$link);
        if($query==1){
            echo "<script type='text/javascript'>alert('Them thanh cong');location.replace('../index.php'); </script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Them that bai'); location.replace('../customer/register.php');</script>";
        }
	}
}
?>