<?php require "inc/config.php"; ?>

<div class="cart">
<?php
	if (!$count) {
		echo "<h3>Shopping cart is empty</h3>";
	}
?>

<?php $goods = myCart(); $sum = 0; $qu = 0;

	if($goods): ?>
<form action="pages/add2cart.php" method="POST">
<ul>
	<?php foreach($goods as $item): ?>
		<li>
			<a class="" href="index.php?page=book&id=<?= $item['prod_id'];?>">
				<img src="img/products_foto/<?= $item['prod_img']; ?>" alt="
		<?= $item['prod_title'];?>"></a>
		<div class="product_info">
			<p class="title"><?= $item['prod_title']; ?></p>
			<p class="author"><?= $item['prod_author']; ?></p>
		</div>
		<div class="flex_item2">
			<p class="price">&#8364;<?= $item['prod_price']; ?></p>
				<input class="" type="text" name="<?= $item['prod_id'];?>" value="<?= $item['prod_quantity'];?>">
			<p class="sub_total">&#8364;<?= number_format(($item["prod_price"] * (int)$item['prod_quantity']), 2, '.', '') ; ?></p>
		</div>
		<div class="btn_cart_delete">
			<a class='btn' href="pages/delete_from_cart.php?id=<?= $item['prod_id'];?>"><span><i class="fa fa-times" aria-hidden="true"></i></span>
			</a>
		</div>
		</li>
		<?php $qu += (int)$item['prod_quantity']; $sum += $item["prod_price"] * (int)$item["prod_quantity"]; ?>
<?php endforeach;?>
</ul>
<div class="btn_cart_container" ">
	<button class="btn btn_cart" type="submit" id="btn_update" name="update">Update my cart</button>
</div>
</form>

<div class="row">
	<!--CART TOTALS-->
	<div class="cart_totals">
		<h2>Cart Totals</h2>

		<table class="table" cellspacing="0">
			<tbody>
				<tr class="">
					<th>Items:</th>
					<td>
						<span class="amount">
							<?= $qu ;?></span>
					</td>
				</tr>
				<tr class="">
					<th>Order Total</th>
					<td> <strong>
						<span class="amount">&#8364;<?= number_format($sum, 2, '.', '') ;?></span>
						</strong>
					</td>
				</tr>

			</tbody>

		</table>
		<div class="btn_cart_container">
			<button class="btn btn_cart" type="submit" id="btn_buy" name="buy">Buy</button>
		</div>
	</div>
	<!-- CART TOTALS-->
</div><!-- /.row-->
<?php endif;?>
</div>