<!-- Page Content -->
<div class="container">


	<h1>My cart</h1>
<?php
	if (!$count) {
		echo "<h3>Shopping cart is empty</h3>";
	}
?>
<div class="row">
<form action="add_to_cart.php" method="POST">
<table class="table table-striped">
<tr>
	<th>Menu</th>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Sub-total</th>
	<th></th>
</tr>
<?php $goods = myCart(); $sum = 0; $qu = 0;

	if($goods){
		foreach($goods as $item): ?>
		<tr>
			<td><?= $item['cat_name'] ;?></td>
			<td><?= $item['item_name']."&nbsp;" ;?>
				<?php if($item['lemon']){
				echo "<span class='glyphicon glyphicon-ok'>{$item['lemon']}&nbsp;</span>";}
				if($item['ice']){
				echo "<span class='glyphicon glyphicon-ok'>{$item['ice']}</span>";}
				?>
			</td>
			<td>&#8364; <?= $item["item_price"] ;?></td>
			<td><div class="col-xs-4"><input class="form-control" type="text" name="<?= $item['item_id'];?>" value="<?= $item['quantity'];?>"></div>
			</td>

			<td>&#8364; <?= number_format(($item["item_price"] * (int)$item['quantity']), 2, '.', '') ; ?></td>
			<td><a class='btn btn-danger' href="delete_from_cart.php?id=<?= $item['item_id'];?>"><span class='glyphicon glyphicon-remove'></span></a></td>
		</tr>
		<?php $qu += (int)$item['quantity']; $sum += $item["item_price"] * (int)$item["quantity"]; ?>
<?php endforeach; }?>
</table>

<div class="text-center" ">
	<button class="btn btn-info btn-md" type="submit" id="btn_update" name="update">Update my cart</button>
</div>
</form>
</div><!--/.row-->

<!--CART TOTALS-->
<div class="row">
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">
<tbody>
<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?= $qu ;?></span></td>
</tr>
<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#8364; <?= number_format($sum, 2, '.', '') ;?></span></strong> </td>
</tr>

</tbody>

</table>
<div class="pull-right">
	<button class="btn btn-success btn-lg" type="submit" id="btn_buy" name="buy">Buy</button>
</div>

</div><!-- CART TOTALS-->
</div><!-- /.row-->
</div>
<!-- /.container -->