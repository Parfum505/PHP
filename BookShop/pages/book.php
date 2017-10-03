<?php require "inc/config.php"; ?>

<?php
	if (isset($_GET['page']) && ($_GET['page'] == 'book') && !empty($_GET['id'])) {
		$item = show_item_page($_GET['id']);
	}
?>


			<img class="" src="<?php echo $item[0]['prod_img'];?>" alt="">
			<div class="">
				<h4>
					<a href="#">
						<?= $item[0]['prod_title']; ?></a>
				</h4>
				<hr>
				<p>
					<?= $item[0]['prod_author']; ?></p>
				<p>
					<?= $item[0]['prod_description']; ?></p>
					<span class="">
					<?= "&#8364; " . $item[0]['prod_price']; ?></span>

				<div class="">
					<a href="add2cart.php?add=<?= $item[0]['prod_id']; ?>" class="">Add to cart</a>
				</div>

			</div>