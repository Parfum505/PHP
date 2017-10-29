<?php require "inc/config.php"; ?>
<?php
if (isset($_GET['page']) && ($_GET['page'] == 'search')){
	if(isset($_GET['query'])){
		$limit = 12;
		$pageNumber = isset($_GET["q"]) ? intval($_GET["q"]) : 1;
		$title = clearString(htmlspecialchars_decode($_GET['query']));
		$items = '';
		if(empty($_GET['query']) || empty($title)){
			setMessage('Your request is empty, title is required');
		}else{
			if(!empty($title)) {
				$items = searchByTitle($title, $limit, $pageNumber);
			}
		}
	}
}
?>


<div class="search">
	<p class="message">
		<?php if(isset($_SESSION['message'])) showMessage(); ?>
	</p>
<?php if(!empty($title)){
		if($totalProducts = totalProducts(0, $title)){
			echo "<p class='total_products'>We&apos;ve found <span>{$totalProducts}</span> book(s) by your request.</p>";
		} else {
			echo '<p class="total_products">We&apos;ve found <span>0</span> book(s) by your request.</p>';
		}
	}
?>


<ul class='product'>
<?php if(!empty($items)){
	foreach($items as $item): ?>
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
		if($totalPages = totalPagesPagination($limit, 0, $title)){
			echo pagination($totalPages, $pageNumber, "index.php?page=search&query={$title}&");
		}
	?>
	</div>
</div>