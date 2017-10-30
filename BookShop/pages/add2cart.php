<?php require "../inc/config.php";

if (isset($_GET['add'])) {
	$id= (int)$_GET['add'];
	add2Cart($id);

	redirectBackward();
}

if (isset($_POST['update'])) {
	unset($_POST['update']);
		foreach ($_POST as $id => $value) {
			updateCart($id, $value);
		}
	redirectBackward();
	}