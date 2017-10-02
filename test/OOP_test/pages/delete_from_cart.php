<?php require_once("../resources/config.php");

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
	$cart->deleteItemFromCart($id);
}
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");
	exit();
