<?php
// require_once "secure/session.inc.php";
// require_once "secure/secure.inc.php";

// if(isset($_GET['logout'])) {
// 	logOut();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php require_once('../common_pages/header.php'); ?>

<div class="container">
	<h1>Administration of the e-shop</h1>
	<aside>
		<h3>Action options:</h3>
		<ul>
			<li>
				<a href='add2cat.php'>Adding items to the catalog</a>
			</li>
			<li>
				<a href='orders.php'>See orders</a>
			</li>
			<li>
				<a href='secure/create_user.php'>Adding users</a>
			</li>
			<li>
				<a href='index.php?logout'>Log out</a>
			</li>
		</ul>
	</aside>
	<article>
		<header>
			<h1>article header h1</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.
			</p>
		</header>
		<section>
			<h2>article section h2</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.
			</p>
		</section>
	</article>

</div>
<!-- /.container -->
</body>
</html>