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
	<div class="slider">
		<h3>New arrivals</h3>
		<?php $items = getlastitems(15);
			if ($items){
				show_slider($items);
			}
		?>
	</div>
<?php if($totalProducts = totalProducts()):?>
	<p class="total_products">We have <span><?= $totalProducts?></span> book(s) in our Bookshop.</p>
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