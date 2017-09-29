<?php require_once("../resources/config.php"); ?>


<?php

if (isset($_POST['add'])) {
	$id= (int)$_POST['item_id'];
	$qu= (int)$_POST['quantity'];
	$ref = $_SERVER["HTTP_REFERER"];
	add2Cart($id, $qu);

	header("Location: {$ref}");

}

if (isset($_POST['update'])) {
	unset($_POST['update']);
		foreach ($_POST as $id => $value) {
			updateCart($id, $value);
		}
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");

	}
