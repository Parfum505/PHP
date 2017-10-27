<?php require "inc/config.php"; ?>
<?php
	$limit = 2;
	$pageNumber = isset($_GET["q"]) ? intval($_GET["q"]) : 1;
	$all_items = show_all_items($limit, $pageNumber);
?>
<div class="main">
<h2>Main page</h2>
<ul class='product'>
<?php if($all_items){
	foreach($all_items as $item): ?>
	<li>
	<a href="index.php?page=book&id=<?= $item['prod_id'];?>">
		<img src="img/products_foto/<?= $item['prod_img']; ?>" alt="
		<?= $item['prod_title'];?>"></a>
		<div class="product_info">
		<p class="title"><?= $item['prod_title']; ?></p>
		<p class="author"><?= $item['prod_author']; ?></p>
		<p class="price">&#8364;<?= $item['prod_price']; ?></p>
		<a href="add2cart.php?id=<?= $item['prod_id']; ?>" class='btn'>Add to cart</a>
		</div>
	</li>
<?php endforeach;} ?>
</ul>

	<div id='pagination'>
	<?php
		if($totalPages = totalPagesPagination($limit)){
			echo pagination($totalPages, $pageNumber, "?");
		}
	?>
	</div>
</div>