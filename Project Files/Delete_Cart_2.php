<?php 
session_start();
$items_2 = $_SESSION['cart_2'];
$cartitems_2 = explode(",", $items_2);
if(isset($_GET['remove']) & !empty($_GET['remove']))
{
	$delitem_2 = $_GET['remove'];
	unset($cartitems_2[$delitem_2]);
	$itemids_2 = implode(",", $cartitems_2);
	$_SESSION['cart_2'] = $itemids_2;
}
header('Location:My_Cart.php');
?>