<?php require "../inc/config.php"; ?>

<?php $title = "BookShop catalogue"; ?>
<?php include_once (COMMON_PAGES . "header.php"); ?>

<div class="container">
	<h1>Bookshop</h1>
	<div class="row">
<?php include_once (COMMON_PAGES . "aside_shop.php"); ?>
<main>
	<?php get_products(); ?>
</main>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>
