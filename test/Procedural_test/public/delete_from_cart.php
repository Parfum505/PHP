<?php require_once("../resources/config.php");

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
	deleteItemFromCart($id);
}
	header('Location: index.php?cart');
	exit();
