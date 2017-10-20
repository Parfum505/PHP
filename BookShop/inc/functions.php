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
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	// return $message;
}
function clearString($str){
	return trim(strip_tags($str));
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
	if (!$res) {
		setMessage("Wrong email or password");
	} else {
		$_SESSION['username'] = $res[0]['user_name'];
		setMessage("Nice to see you {$res[0]['user_name']}");

	}

	redirectBackward();
}
function singup($firstName, $lastName, $email, $pass, $confirmPass){
	if($pass !== $confirmPass){
		setMessage("Please comfirm your password");
		redirectBackward();
	}
	global $link;
	$stmt = query_prep("SELECT * FROM users WHERE user_email = :email AND user_password = :pass ");
	bind($stmt, ':email', $email);
	bind($stmt, ':pass', $pass);
	$res = resultset($stmt);
	if (!$res) {
		setMessage("Wrong email or password");
	} else {
		$_SESSION['username'] = $res[0]['user_name'];
		setMessage("Nice to see you {$res[0]['user_name']}");

	}

	redirectBackward();
}
function checkEmail($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : false;
}
function sendEmail($subject, $message, $email, $name){
		$to = "parfum05@mail.ru";
		$header = "From: {$name}, {$email}";
		$res = mail($to, $subject, $message, $header);
		if (!$res) {
			setMessage("Sorry we couldn't send your message");
		} else {
			setMessage("Your Message has been sent sucsessfuly");
		}
		// redirectBackward();
}
/*** Admin functions ***/