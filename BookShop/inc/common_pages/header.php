<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo isset($title) ? $title : 'BookShop'; ?></title>
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
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="wrapper">

<header class="">

	<div class="header_log_in">
		<div class="container">
			<div class="row">
				<ul class="">
					<li>
							<a href="#">
								<span><i class="fa fa-user" aria-hidden="true"></i>
								</span>
								<?php
									echo isset($SESSION["username"]) ? $SESSION["username"] : "Guest" ;
								?>
							</a>
						</li>
						<li>
							<a href="#">
								Log in
								<span> <i class="fa fa-sign-in" aria-hidden="true"></i>
								</span>
							</a>
						</li>
						<li>
							<a href="#">
								Sign up
								<span >
									<i class="fa fa-user-plus" aria-hidden="true"></i>
								</span>
							</a>
						</li>
					</ul>
			</div><!-- /.row -->
		</div><!-- /.container -->

	</div><!-- /.header_login -->
	<div class="container">
		<div class="header_top">
		<div class="row">
			<div class="logo">
				<a class="" href="../catalog.php">
					<img src="../img/logo_image.png" alt="logo"></a>
			</div><!-- /.logo --><!--
			--><div class="header_form_search">
						<form action="" method="GET">
								<input type="text" class="" placeholder="Search by title"><!--
								--><button class="" type="submit"> <i class="fa fa-search" aria-hidden="true"></i>
								</button>
						</form>
					</div><!-- /.header_search_form --><!--
			--><div class="header_cart">
							<a href="basket.php">
								<!-- <?= $count ?>
								-->
								items
								<span >
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</span>
							</a>
					</div><!-- /.header_cart -->
			</div>
		<!-- /.row -->
		</div><!-- /.header_top -->
		<div class="header_nav">
			<div class="nav_btn_mobile slideToggle">
					<span>
						<i class="fa fa-bars" aria-hidden="true"></i>
						&ensp; Menu
					</span>
			</div>
			<!-- /.nav_btn_mobile -->
			<nav class="nav_main content" role='navigation'">
				<ul class="">
					<li>
						<a class="active" href="main.php">BookShop</a>
					</li><!--
					--><li>
						<a href="about_us.php">About us</a>
					</li><!--
					--><li>
						<a href="terms_conditions.php">Terms &amp; Conditions</a>
					</li><!--
					--><li>
						<a href="contacts.php">Contacts</a>
					</li>
				</ul>
			</nav>
			<!-- /.nav_main -->
		</div>
		<!-- /.header_nav -->
	</div>
	<!-- /.container -->
</header>