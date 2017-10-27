<?php require "inc/config.php"; ?>
<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'category') && !empty($_GET['id'])) {
		$limit = 12;
		$id = intval($_GET["id"]);
		$pageNumber = isset($_GET["q"]) ? intval($_GET["q"]) : 1;
		$cat_items = show_category_items($id, $limit, $pageNumber);
	}
?>
<div class="category">
<h2><?php if($cat_items)  echo $cat_items[0]['cat_title'];?></h2>
<ul class='product'>
<?php if($cat_items){
	foreach($cat_items as $item): ?>
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
		if($totalPages = totalPagesPagination($limit, $id)){
			echo pagination($totalPages, $pageNumber, "index.php?page=category&id={$id}&");
		}
	?>
	</div>
</div>

