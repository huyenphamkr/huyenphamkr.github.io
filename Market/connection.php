<?php
class csdl
{
	function connect()
	{
		$con=mysql_connect("localhost","huyenhcr","123456");
		if(!$con)
		{
			echo 'Khong ket noi duoc';
			exit();
		}
		else
		{
			mysql_select_db("market");
			mysql_query("SET NAMES UTF8");
			return $con;
		}
	}
	function close(){
		$con=mysql_connect("localhost","huyenhcr","123456");
		mysql_close($con);
	}
	
}
?>