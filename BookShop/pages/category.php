<?php require "inc/config.php"; ?>
<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'category') && !empty($_GET['id'])) {
		$cat_items = show_category_items($_GET['id']);
	}
?>
<div class="category">
<h2><?= $cat_items[0]['cat_title'];?></h2>
<ul class='product'>
<?php foreach($cat_items as $item): ?>
	<li>
	<a href="index.php?page=book&id=<?= $item['prod_id'];?>">
		<img src="<?= $item['prod_img']; ?>" alt="
		<?= $item['prod_title'];?>">
		<p class="title"><?= $item['prod_title']; ?></p>
		<p class="author"><?= $item['prod_author']; ?></p>
		<p class="price">&#8364;<?= $item['prod_price']; ?></p>
		<a href="add2cart.php?id=<?= $item['prod_id']; ?>" class='btn'>Add to cart</a>
	</a>
	</li>
<?php endforeach; ?>
</ul>
</div>
