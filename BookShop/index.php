<?php session_start(); ?>
<?php require "inc/config.php";

	if(isset($_GET['logout'])){
		logOut();
	}
?>
<?php $title = "BookShop"; ?>
<?php include_once (COMMON_PAGES . "header.php"); ?>

<div class="container">
	<div class="row">
<?php include_once (COMMON_PAGES . "aside_shop.php"); ?>
<main>
	<?php
	$pages = array_slice(scandir('pages'), 2);

	if (isset($_GET['page'])) {
		$page = $_GET['page'] . '.php';

		if (in_array($page, $pages)) {
			include_once 'pages/' . $page;
		} else {
			include_once 'pages/main.php';
		}

	} else {
		include_once 'pages/main.php';
	}
	?>
</main>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>