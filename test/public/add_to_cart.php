<?php require_once("../resources/config.php"); ?>


<?php

if (isset($_POST['add'])) {
	$id= (int)$_POST['item_id'];
	$qu= (int)$_POST['quantity'];
	$lemon= isset($_POST['lemon'])?$_POST['lemon'] : '' ;
	$ice= isset($_POST['ice'])?$_POST['ice'] : '' ;
	$ref = $_SERVER["HTTP_REFERER"];
	add2Cart($id, $qu, $lemon, $ice);

	header("Location: {$ref}");

}

if (isset($_POST['update'])) {
	unset($_POST['update']);
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
		foreach ($_POST as $id => $value) {
			updateCart($id, $value);
		}
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");

	}
