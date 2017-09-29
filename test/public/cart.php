<!-- Page Content -->
<div class="container">


	<h1>My cart</h1>
<?php
	if (!$count) {
		echo "<h3>Shopping cart is empty</h3>
		<p>You have no items in your shopping cart.</p>";
	}
?>
<form action="add_to_cart.php" method="POST">
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N</th>
	<th>Name</th>
	<th>Price, euro</th>
	<th>Quantity</th>
	<th>Delete</th>
</tr>
<?php $goods = myCart(); $i = 1; $sum = 0;
	if($goods){
		foreach($goods as $item): ?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $item['item_name'] ?></td>
			<td><?= $item["item_price"] ?></td>
			<td><input type="text" name="<?= $item['item_id']?>" value="<?= $item['quantity']?>">
			</td>
			<td><a href="delete_from_cart.php?id=<?= $item['item_id']?>">Remove</a></td>
		</tr>
		<?php $i++; $sum += $item["item_price"] * $item["quantity"]; ?>
<?php endforeach; }?>
</table>

<p>Value of purchases: <?= $sum; ?> euro.</p>

<div align="center">
	<input type="submit" id="btn_change" name="update" value="Update my cart">
</div>
</form>
</div>
<!-- /.container -->