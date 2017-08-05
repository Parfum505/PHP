<?php
require_once "secure/session.inc.php";
require_once "secure/secure.inc.php";

if(isset($_GET['logout'])) {
	logOut();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Administration of the e-shop</h1>
	<h3>Action options:</h3>
	<ul>
		<li><a href='add2cat.php'>Adding items to the catalog</a></li>
		<li><a href='orders.php'>See orders</a></li>
		<li><a href='secure/create_user.php'>Adding users</a></li>
		<li><a href='index.php?logout'>Log out</a></li>
	</ul>
</body>
</html>
