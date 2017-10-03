<?php require "inc/config.php"; ?>
<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'category') && !empty($_GET['id'])) {
		$cat_items = show_category_items($_GET['id']);
	}
?>
			<h2><?= $cat_items[0]['cat_title'];?></h2>

			<?php foreach($cat_items as $item): ?>
			<div class='product'>
			<a href="index.php?page=book&id=<?= $item['prod_id'];?>">
				<img src="<?= $item['prod_img']; ?>" alt="
				<?= $item['prod_title'];?>">
				<p>
					<?= $item['prod_title']; ?></p>
				<p>
					<?= $item['prod_author']; ?></p>
				<p>
					<?= $item['prod_description']; ?></p>
				<p>
					&#8364;
					<?= $item['prod_price']; ?></p>
				<a href="add2cart.php?id=<?= $item['prod_id']; ?>">Add to cart</a>
			</a>
			</div>

			<?php endforeach; ?>
