<?php
require "inc/config.php";
require "inc/slider.php";
?>
<?php
	$limit = 12;
	$pageNumber = isset($_GET["q"]) ? intval($_GET["q"]) : 1;
	$all_items = show_all_items($limit, $pageNumber);
?>
<div class="main">
	<span class="message_confirm">
		<?php if(isset($_SESSION['messageConfirm'])){
			echo '<i class="fa fa-check" aria-hidden="true"></i> ';
			showMessageConfirm();
			} ?>
	</span>
	<div class="slider">
		<h3>New arrivals</h3>
		<?php $items = getlastitems(15);
			if ($items){
				show_slider($items);
			}
		?>
	</div>
<?php if($totalProducts = totalProducts()):?>
	<p class="total_products">Total <span><?= $totalProducts?></span> book(s) in our Bookshop.</p>
<?php endif;?>

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
		if($totalPages = totalPagesPagination($limit)){
			echo pagination($totalPages, $pageNumber, "?");
		}
	?>
	</div>
</div>