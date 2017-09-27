<?php require "../inc/config.php"; ?>

<?php
	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$item = show_item_page($_GET['id']);
	}

$title = $item[0]['prod_title']; ?>

<?php include_once (COMMON_PAGES . "header.php"); ?>

<div class="container">
	<div class="row">
		<?php include_once (COMMON_PAGES . "aside_shop.php"); ?>
		<main>
			<?php  ?>
			<img class="" src="<?php echo $item[0]['prod_img']; ?>
			" alt="">
			<div class="">
				<h4>
					<a href="#">
						<?php echo $item[0]['prod_title']; ?></a>
				</h4>
				<hr>
				<p>
					<?php echo $item[0]['prod_author']; ?></p>
				<p>
					<?php echo $item[0]['prod_description']; ?></p>
					<span class="">
					<?php echo "&#8364;" . $item[0]['prod_price']; ?></span>

				<div class="">
					<a href="cart.php?add=<?php echo $item[0]['prod_id']; ?>" class="">ADD</a>
				</div>

			</div>
		</main>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>