<?php
include('../class/order.php');
session_start();
//kiem tra nếu chưa đăng nhập thì chuyển về trang index.php 
if(!isset($_SESSION['CustomerID'])) 
{
	echo "<script type='text/javascript'>alert('chua dang nhap!');</script>";
	header ('location:../customer/login.php');
}

$order = new order();
$products=$_SESSION['cart'];
$cusid=$_SESSION['CustomerID'];
$total=$_SESSION['Total'];
//ngay order
$date = getdate();
$dateorder=$date['year'].'-'.$date['mon'].'-'.$date['mday'];
$note="";
//thêm thông tin vào order
$order->addOrder($cusid, $dateorder, $total, $note);

foreach($products as $item) : 
	$vegetableid=$item['id'];
	$quantity=$item['quantity'];
	$price=$item['price'];
	//thêm thông tin vào order detail
	$order->addOrderDetail($cusid, $dateorder,$vegetableid, $quantity, $price);
endforeach;
?>
