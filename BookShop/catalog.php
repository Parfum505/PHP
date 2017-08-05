<?php

require "inc/lib.inc.php";
require "inc/config.inc.php";


	$goods = selectAllItems();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Items catalogue</title>
</head>
<body>
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
</body>
</html>