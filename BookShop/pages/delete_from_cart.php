<?php require "../inc/config.php";

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
	deleteItemFromCart($id);
}
	redirectBackward();