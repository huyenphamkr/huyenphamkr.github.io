<?php
include ('../connection.php');
class order
{
	function getAllOrder($cusID){
		$sql="SELECT * FROM `orders` WHERE CustomerID = '$cusID'";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		$kt->close();
		return $ketqua;
	}
	function getOrderDetail($orderid){
		$sql="SELECT * FROM `orderdetail` WHERE OrderID = '$orderid'";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		return $ketqua;
	}
	function addOrder($cusid, $date, $total, $note){
		$kt = new csdl();
		$link=$kt->connect();
		$sql= "INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES ('' , '$cusid',  '$date', '$total', '$note')";
		$query=mysql_query($sql,$link);	
		if($query==1){
            echo "<script type='text/javascript'>alert('Them thanh cong');</script>";
        }
        else
        {
        	echo "<script type='text/javascript'>alert('Them khong thanh cong');</script>";
        }
	}
	function addOrderDetail($cusid, $date,$vegetableid, $quantity, $price)
	{
		$kt = new csdl();
		$link=$kt->connect();
		$sql2="SELECT * FROM `orders` WHERE CustomerID = '$cusid' AND Date = '$date'";
		$ketqua = mysql_query($sql2,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$orderid = $row['OrderID'];
				$sql3= "INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES ('$orderid' , '$vegetableid,',  '$quantity', '$price')";
				$query3=mysql_query($sql3,$link);
				if($query3==1){
            		echo "Them thanh cong";
            		header('location:./history.php');
        		}
        		else
        		{
        			echo "Them khong thanh cong";
        		}
				session_start();
				$_SESSION['OrderID']=$orderid;	
			}
		}
		
	}
}
	

?>
