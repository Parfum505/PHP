<?php require "inc/config.php"; ?>
<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'book') && !empty($_GET['id'])) {
		$item = show_item_page($_GET['id']);
	}
?>

<div class="single_book">
	<span class="message_confirm">
		<?php if(isset($_SESSION['messageConfirm'])){
			echo '<i class="fa fa-check" aria-hidden="true"></i> ';
			showMessageConfirm();
			} ?>
	</span>
	<div class="single_book_img">
		<img class="" src="img/products_foto/<?php echo $item[0]['prod_img'];?>" alt="">
	</div>
	<div class="single_book_info">
		<h2>
			<?= $item[0]['prod_title']; ?>
		</h2>
		<p class="author">
			<?= $item[0]['prod_author']; ?></p>
		<p class="description">
			<?= $item[0]['prod_description']; ?></p>
		<p class="price">
			<?= "&#8364; " . $item[0]['prod_price']; ?></p>

		<form action="pages/add2cart.php" method="POST">
			<input type="text" hidden="hidden" name="prod_title" value="<?= $item[0]['prod_title']; ?>">
			<input type="text" hidden="hidden" name="prod_id" value="<?= $item[0]['prod_id']; ?>">
			<input type="submit" name="add" class='btn' value ="Add to cart">
		</form>
	</div>
</div>