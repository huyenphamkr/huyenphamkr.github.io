<?php
session_start();
include ('../connection.php');
class checklogin
{
	function login($user,$pass)
	{
		$sql="SELECT CustomerID, Password, FullName FROM `customers` WHERE CustomerID = '$user' AND Password = '$pass' LIMIT 1";
		$kt = new csdl();
		$link=$kt->connect();
		$ketqua = mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i==1)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$id = $row['CustomerID'];
				$password = $row['Password'];
				$fullname = $row['FullName'];
				session_start();
				$_SESSION['CustomerID']=$id;
				$_SESSION['Password']=$password;
				$_SESSION['FullName']=$fullname;
				header ('location:../vegetable/index.php');	
			}
		}
		else
		{
			echo "<script type='text/javascript'>alert('Không tìm thấy tài khoản'); location.replace('login.php');</script>";		
		}
	}
}
?>