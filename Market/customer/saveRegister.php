<?php
include ('../connection.php');
$kt = new csdl();
class save 
{
    function saveregister($fullname,$pass,$address,$city)
    {
        $kt = new csdl();
        $con=$kt->connect();
        $sql= "INSERT INTO `customers` (`CustomerID` ,`Password` ,`FullName` ,`Address` ,`City`) VALUES ('' , '$pass', '$fullname', '$address', '$city')";
        $query=mysql_query($sql,$con);
        if($query==1){
            echo "<script type='text/javascript'>alert('Đăng kí thành công');</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Đăng kí không thành công');</script>";
        }
    }
}
?>
