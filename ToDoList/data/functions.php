<?php
include_once "database.php";
if (isset($_POST['name']) && isset($_POST['start_date'])) {
	echo $_POST['name']." ".$_POST['start_date'];
}
