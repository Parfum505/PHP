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
	<p class="message_confirm">
		<?php if(isset($_SESSION['messageConfirm'])){
			echo '<i class="fa fa-check" aria-hidden="true"></i> ';
			showMessageConfirm();
			} ?>
	</p>
<h2><?php if($cat_items)  echo $cat_items[0]['cat_title'];?></h2>
<ul class='product'>
<?php if($cat_items){
	foreach($cat_items as $item): ?>
	<li>
	<a href="index.php?page=book&id=<?= $item['prod_id'];?>">
		<img src="img/products_foto/<?= $item['prod_img']; ?>" alt="
		<?= $item['prod_title'];?>">
	</a>
		<div class="product_info">
		<p class="title"><?= $item['prod_title']; ?></p>
		<p class="author"><?= $item['prod_author']; ?></p>
		<p class="price">&#8364;<?= $item['prod_price']; ?></p>
		<form action="pages/add2cart.php" method="POST">
			<input type="text" hidden="hidden" name="prod_title" value="<?= $item['prod_title']; ?>">
			<input type="text" hidden="hidden" name="prod_id" value="<?= $item['prod_id']; ?>">
			<input type="submit" name="add" class='btn' value ="Add to cart">
		</form>
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

