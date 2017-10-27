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
	return  htmlspecialchars(trim(strip_tags($str)));
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
	$stmt = query("SELECT * FROM categories");
	$res = resultset($stmt);
	return $res ? $res: false;
}
function show_all_items($limit, $pageNumber = 1){
	$startpoint = ($limit * $pageNumber) - $limit;
	$stmt = query("SELECT * FROM products");
	$res = resultset($stmt);
	return $res ? $res: false;
}
function show_category_items($cat_id, $limit, $pageNumber = 1){
	$startpoint = ($limit * $pageNumber) - $limit;
	$stmt = query_prep("SELECT * , cat_title FROM products
		JOIN categories ON prod_cat_id = cat_id
		WHERE prod_cat_id = :cat_id LIMIT $startpoint, $limit");
	bind($stmt, ':cat_id', $cat_id);
	$res = resultset($stmt);
	return $res ? $res: false;
}
function show_item_page($id){
	$stmt = query_prep("SELECT * FROM products WHERE prod_id = :id ");
	bind($stmt, ':id', $id);
	$res = resultset($stmt);
	return $res ? $res: false;
}
function login($email, $pass){
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
function logOut(){
	session_destroy();
	redirect('index.php');
}
function userExist($email){
	$stmt = query_prep("SELECT user_email FROM users WHERE user_email = :email");
	bind($stmt, ':email', $email);
	$res = resultset($stmt);
	return $res ? true: false;
}
function singup($firstName, $lastName, $email, $pass){
		$stmt = query_prep("INSERT INTO users (user_name, last_name, user_email, user_password)
			VALUES (:firstName, :lastName, :email, :pass) ");
		bind($stmt, ':firstName', $firstName);
		bind($stmt, ':lastName', $lastName);
		bind($stmt, ':email', $email);
		bind($stmt, ':pass', $pass);
		$res = execute($stmt);
		if (!$res) {
			setMessage("Can't register {$firstName}, please try late");
		} else {
			$_SESSION['username'] = $firstName;
			setMessage("Nice to see you {$firstName}");
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
}
function remindPassword($email){
	$stmt = query_prep("SELECT user_password FROM users WHERE user_email = :email");
	bind($stmt, ':email', $email);
	$res = resultset($stmt);
	$password = $res[0]['user_password'];
	$to = $email;
	$header = "From: Bookshop, parfum05@mail.ru";
	$subject = "Remind password";
	$message = "Your password is {$password}";
	$res = mail($to, $subject, $message, $header);
		if (!$res) {
			setMessage("Sorry we couldn't send your password");
		} else {
			setMessage("Password has been sent on email {$email}");
		}
}
function totalPagesPagination($limit, $id = 0){
	if ($id) {
		$stmt = query("SELECT Count(prod_id) AS total FROM products WHERE prod_cat_id = $id");
	} else {
		$stmt = query("SELECT Count(prod_id) AS total FROM products");
	}

	$res = resultset($stmt);
	if($res){
		$totalItems = $res[0]["total"];
		return $totalPages = ceil($totalItems / $limit);
	} else {
		return false;
	}
}
function pagination($totalPages, $pageNumber = 1, $url){
	$lastpageMinus1 = $totalPages - 1;
	$prev = $pageNumber - 1;
	$next = $pageNumber + 1;
	$pagination = "";

if ($totalPages > 1) {
	$pagination .= "<ul class='pagination'>";
	if($pageNumber <=1 ){
		$pagination .= "<li><a class='current'>Prev</a></li>";
	}
	else{
		$pagination .= "<li><a href='{$url}q={$prev}'>Prev</a></li>";
	}
	if ($totalPages < 8) {
		for ($count=1; $count<= $totalPages ; $count++) {
			if ($count == $pageNumber) {
				$pagination .= "<li><a class='current'>{$count}</a></li>";
			} else {
				$pagination.= "<li><a href='{$url}q={$count}'>{$count}</a></li>";
			}

		}
	} else {
		if ($pageNumber < 6 ) {
			for ($count=1; $count<= $pageNumber ; $count++) {
				if ($count == $pageNumber) {
					$pagination .= "<li><a class='current'>{$count}</a></li>";
				} else {
				$pagination.= "<li><a href='{$url}q={$count}'>{$count}</a></li>";
				}
			$pagination.= "<li class='dot'>..</li>";
			$pagination.= "<li><a href='{$url}q={$totalPages}'>{$totalPages}</a></li>";
			}
		} else {
			$pagination.= "<li><a href='{$url}q=1'>1</a></li>";
			$pagination.= "<li><a href='{$url}q=2'>2</a></li>";
			$pagination.= "<li class='dot'>..</li>";
			$pagination.= "<li><a class='current'>{$pageNumber}</a></li>";
			if ($pageNumber < $totalPages - 1) {
				$pagination.= "<li class='dot'>..</li>";
				$pagination.= "<li><a href='{$url}q={$lastpageMinus1}'>{$lastpageMinus1}</a></li>";
				$pagination.= "<li><a href='{$url}q={$totalPages}'>{$totalPages}</a></li>";
			} elseif ($pageNumber == $totalPages - 1) {
				$pagination.= "<li><a href='{$url}q={$totalPages}'>{$totalPages}</a></li>";
			}

		}

	}
	if($pageNumber == $totalPages){
		$pagination .= "<li><a class='current'>Next</a></li>";
	}
	else{
		$pagination .= "<li><a href='{$url}q={$next}'>Next</a></li>";
	}


	$pagination.= "</ul>";
	return $pagination;
	} else {
	return false;
	}

}





/*** Admin functions ***/