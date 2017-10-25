<?php require "inc/config.php"; ?>
<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'book') && !empty($_GET['id'])) {
		$item = show_item_page($_GET['id']);
	}
?>

<div class="single_book">
	<div class="single_book_img">
		<img class="" src="<?php echo $item[0]['prod_img'];?>" alt="">
	</div>
	<div class="single_book_info">
		<h2>
			<?= $item[0]['prod_title']; ?>
		</h2>
		<p class="author">
			<?= $item[0]['prod_author']; ?></p>
		<p class="description">
			<?= $item[0]['prod_description']; ?></p>
		<p class="price">
			<?= "&#8364; " . $item[0]['prod_price']; ?></p>

		<div class="">
			<a href="add2cart.php?add=<?= $item[0]['prod_id']; ?>" class="btn">Add to cart</a>
		</div>
	</div>
</div>