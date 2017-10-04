<?php require_once("../resources/config.php");


if (isset($_POST['add'])) {
	$id= $_POST['item_id'];
	$name = $cat_name = $_POST['item_name'];
	$price = $_POST['item_price'];
	$group = $_POST['cat_name'];
	$qu= (int)$_POST['quantity'];
	$lemon= isset($_POST['lemon'])? trim(strip_tags($_POST['lemon'])) : '' ;
	$ice= isset($_POST['ice'])? trim(strip_tags($_POST['ice'])) : '' ;

	$item = new Items($id, $name, $price, $group, $ice, $lemon);

	$cart->add2Cart($item, $qu);
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");
	exit();
}

if (isset($_POST['update'])) {
	unset($_POST['update']);
		foreach ($_POST as $id => $value) {
			$cart->updateCart($id, $value);
		}
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");
	exit();
	}
