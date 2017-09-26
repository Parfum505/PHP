<?php require "../inc/config.php"; ?>

<?php
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$cat_items = show_category_items($_GET['id']);
	}
$title = "Catalogue"; ?>

<?php include_once (COMMON_PAGES . "header.php"); ?>

<div class="container">

	<div class="row">
		<?php include_once (COMMON_PAGES . "aside_shop.php"); ?>
		<main>
			<h1></h1>
			<?php foreach($cat_items as $item): ?>
			<a class='product' href="item.php?id=<?= $item['prod_id'];?>
				">
				<img src="<?= $item['prod_img']; ?>" alt="
				<?= $item['prod_title'];?>
				">
				<p>
					<?= $item['prod_title']; ?></p>
				<p>
					<?= $item['prod_author']; ?></p>
				<p>
					<?= $item['prod_description']; ?></p>
				<p>
					&#8364;
					<?= $item['prod_price']; ?></p>
				<a href="cart.php?id=<?= $item['prod_id']; ?>">Add to cart</a>
			</a>

			<?php endforeach; ?>
		</main>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>