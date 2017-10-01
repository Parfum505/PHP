<?php require_once("../resources/config.php");


if (isset($_POST['add'])) {
	$id= (int)$_POST['item_id'];
	$qu= (int)$_POST['quantity'];
	$lemon= isset($_POST['lemon'])? trim(strip_tags($_POST['lemon'])) : '' ;
	$ice= isset($_POST['ice'])? trim(strip_tags($_POST['ice'])) : '' ;
	$ref = $_SERVER["HTTP_REFERER"];
	add2Cart($id, $qu, $lemon, $ice);

	header("Location: {$ref}");
	exit();
}

if (isset($_POST['update'])) {
	unset($_POST['update']);
		foreach ($_POST as $id => $value) {
			updateCart($id, $value);
		}
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");
	exit();
	}
