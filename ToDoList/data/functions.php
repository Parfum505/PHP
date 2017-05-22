<?php
include_once "database.php";

	// Form request, add list

if (isset($_POST['name'])){
		// validate input
	$name = mysqli_real_escape_string($con, strip_tags($_POST['name']));
	if (!isset($name) || $name == '') {
		$error = "Please fill in to-do list";
		header("Location: ../index.php?error=".urlencode($error));
		exit();
	} else {
		// set time
		$start_date = strftime('%F');
		// set request
		$sql = "INSERT INTO list(name, start_date) VALUE('$name', '$start_date')";
		$result = mysqli_query($con, $sql);
			if($result){
				header("Location: ../index.php");
				exit();
			} else{
				exit("Error: ".mysqli_error($con));
			}
		}
}

	// Delete list request

if (isset($_POST['del']) && isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM list WHERE id = '$id'";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo "Error: ".mysqli_error($con) ;
	} else{
		echo "Item deleted";
	}
}
	// Change list request

if (isset($_POST['change']) && isset($_POST['id'])){
	changeDoneDate($con, $_POST['id']);
}

function selectById($con, $id) {
	$sql = "SELECT id, name, start_date, done FROM list WHERE id = '$id' ";
	$result = mysqli_query($con, $sql);
	if (!$result) {
		$result_error = mysqli_error($con);
		echo $result_error;
		return false;
	} else {
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
}
function updateDate($con, $done, $id){
	$sql = "UPDATE list SET done = '$done' WHERE id = '$id' ";
	$result = mysqli_query($con, $sql);
}

function changeDoneDate($con, $id){
	if(!($row = selectById($con, $id))){
		echo "Error: can't change list";
	} else{
		if (!$row['done']) {
			$done = strftime('%F');
			updateDate($con, $done, $id);

		} else {
			$done = null;
			updateDate($con, $done, $id);
		}
		echo($done);
	}

}

	// Show To-Do list function

function getToDO($con) {
	$sql = "SELECT id, name, start_date, done FROM list ORDER BY start_date DESC";
	$result = mysqli_query($con, $sql);
	if (!$result) {
		exit("Error: ".mysqli_error($con));
	} else {
		$list = array();
		while($row = mysqli_fetch_assoc($result)){
			$list[] = $row;
		}
		return $list;
	}
}
