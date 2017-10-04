<?php

/*** Helpers functions ***/

function redirectBackward(){
	$ref = $_SERVER["HTTP_REFERER"];
	header("Location: {$ref}");
	exit();
}
function redirect($ref){
	header("Location: {$ref}");
	exit();
}
function setMessage($message){
	$_SESSION['message'] = $message;
}
function showMessage(){
	$message = $_SESSION['message'];
	// unset($_SESSION['message']);
	return $message;
}

/*** Database functions ***/

function query($query){
	global $link;
	return $link->query($query);
}
function query_prep($query){
	global $link;
	return $link->prepare($query);
}
function bind($stmt, $param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		return $stmt->bindValue($param, $value, $type);
	}
function execute($stmt){
		return $stmt->execute();
}
function resultset($stmt){
		execute($stmt);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
/*** Shop functions ***/

function show_nav_categories(){
	global $link;
	$stmt = query("SELECT * FROM categories");

	$res = resultset($stmt);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	return $res;
}
function show_category_items($cat_id){
	global $link;
	$stmt = query_prep("SELECT * , cat_title FROM products
		JOIN categories ON prod_cat_id = cat_id
		WHERE prod_cat_id = :cat_id ");
	bind($stmt, ':cat_id', $cat_id);
	$res = resultset($stmt);
	return $res;
}
function show_item_page($id){
	global $link;
	$stmt = query_prep("SELECT * FROM products WHERE prod_id = :id ");
	bind($stmt, ':id', $id);
	$res = resultset($stmt);
	return $res;
}
function login($email, $pass){
	global $link;
	$stmt = query_prep("SELECT * FROM users WHERE user_email = :email AND user_password = :pass ");
	bind($stmt, ':email', $email);
	bind($stmt, ':pass', $pass);
	$res = resultset($stmt);
	// echo "<pre>";
	// print_r($res);
	// echo "</pre>";
	if (!$res) {
		setMessage("Wrong email or password");
	} else {
		$_SESSION['username'] = $res[0]['user_name'];
		setMessage("Nice to see you {$res[0]['user_name']}, {$_SESSION['username']}");

	}

	redirect('index.php?page=login');
}
/*** Admin functions ***/