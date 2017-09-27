<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE . DS . "header.php") ?>

<?php $items = get_products('Drinks');

?>
<!-- Page Content -->
<div class="container">
	<div class="row">
        <h2 class="text-center"><?= $items[0]['cat_name'];?></h2>
		<?php foreach($items as $item):?>
        <div class="col-md-4 text-center">

            <a class="product" href="item.php?item_id=<?php echo $item['item_id']; ?>">
                <img src="<?php echo $item['item_img']; ?>" class="img-responsive" alt="Image">
            </a>
            <h3><?= $item['item_name']; ?></h3>
            <p><?= $item['item_discription']; ?></p>
            <span>&#8364; <?= $item['item_price']; ?></span>
            <div class="">
				<a href="cart.php?item_id=<?php echo $item['item_id']; ?>" class="">Add to cart</a>
			</div>

        </div>
    <?php endforeach; ?>
    </div>

drinks
</div>
<!-- /.container -->
<?php include(TEMPLATE . DS . "footer.php") ?>