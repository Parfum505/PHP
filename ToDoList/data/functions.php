<?php
include_once "database.php";

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
if (isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM list WHERE id = '$id'";
	$result = mysqli_query($con, $sql);
	if(!$result){
		echo "Error: ".mysqli_error($con) ;
	} else{
		// header("Location: ../index.php");
		// exit();
	}
}

// function addList($con, $data) {
// 	$name = mysqli_real_escape_string($con, strip_tags($data));
// 	$start_date = strftime('%F');
// 	$sql = "INSERT INTO list(name, start_date) VALUE('$name', '$start_date')";
// 	$result = mysqli_query($con, $sql);
// 	if (!$result) {
// 		$result_error = mysqli_error($con);
// 		echo $result_error;
// 		return false;
// 	}
// 	// header("Location: index.php");
// 	return true;
// }

function getToDO($con) {
	$sql = "SELECT id, name, start_date, done FROM list ORDER BY id DESC";
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
