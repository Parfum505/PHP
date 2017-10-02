<!--Page Content -->
<div class="container">


	<h1 class="text-center">My cart</h1>
<?php
	if (!$cart->count()) {
		echo "<h3>Shopping cart is empty</h3>";
		exit();
	}
?>
<!-- <div class="row"> -->
<form action="pages/add_to_cart.php" method="POST">
<table class="table table-striped">
<tr>
	<th>Menu</th>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Sub-total</th>
	<th></th>
</tr>
<?php $food = $cart->myCart();
$sum = 0; $amount = 0;

	if($food){
		foreach($food as $meal): ?>

		<tr>
			<td><?= $meal['item']->getGroup() ;?></td>
			<td><?= $meal['item']->getName()."&nbsp;" ;?>
				<?php if($meal['item']->getLemon()){
				echo "<span class='glyphicon glyphicon-ok'>{$meal['item']->getLemon()}&nbsp;</span>";}
				if($meal['item']->getIce()){
				echo "<span class='glyphicon glyphicon-ok'>{$meal['item']->getIce()}</span>";}
				?>
			</td>
			<td>&#8364; <?= $meal['item']->getPrice() ;?></td>
			<td><div class="col-xs-4"><input class="form-control" type="text" name="<?= $meal['item']->getId();?>" value="<?= $meal['qu'];?>"></div>
			</td>

			<td>&#8364; <?= $meal['item']->getPrice() * $meal['qu'] ; ?></td>
			<td><a class='btn btn-danger' href="pages/delete_from_cart.php?id=<?= $meal['item']->getId();?>"><span class='glyphicon glyphicon-remove'></span></a></td>
		</tr>
		<?php $amount += $meal['qu']; $sum += $meal['item']->getPrice() * $meal['qu']; ?>
<?php endforeach; }?>
</table>

<div class="text-center" ">
	<button class="btn btn-info btn-md" type="submit" id="btn_update" name="update">Update my cart</button>
</div>
</form>
<!-- </div> --><!--/.row-->

<!--CART TOTALS-->
<!-- <div class="row"> -->
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">
<tbody>
<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?= $amount ;?></span></td>
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
<!-- </div> --><!-- /.row-->
</div>
<!-- /.container