<?php session_start(); ?>
<?php require "../inc/config.php";

if (isset($_POST['add'])) {
	$id= (int)$_POST['prod_id'];
	add2Cart($id);
	setMessageConfirm("Book added to cart");

	redirectBackward();
}

if (isset($_POST['update'])) {
	unset($_POST['update']);
		foreach ($_POST as $id => $value) {
			updateCart($id, $value);
		}
	redirectBackward();
	}