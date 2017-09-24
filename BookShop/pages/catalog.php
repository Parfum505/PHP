<?php

require "../inc/config.php";


	//$goods = selectAllItems();

?>
<?php $title = "BookShop catalogue"; ?>
<?php include_once (COMMON_PAGES . "header.php"); ?>

<div class="container">
	<h1>Bookshop</h1>
	<div class="row">
<?php include_once (COMMON_PAGES . "aside_shop.php"); ?>

<p>Items in <a href="basket.php">the cart</a>: <?= $count ?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Title</th>
	<th>Author</th>
	<th>Year of publish</th>
	<th>Price, euro</th>
	<th>Add to cart</th>
</tr>

<?php foreach($goods as $item): ?>
	<tr>
		<td><?= $item["title"] ?></td>
		<td><?= $item["author"] ?></td>
		<td><?= $item["pubyear"] ?></td>
		<td><?= $item["price"] ?></td>
		<td><a href="add2basket.php?id=<?= $item['id']?>">Add to cart</a></td>
	</tr>
<?php endforeach;?>
</table>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>
