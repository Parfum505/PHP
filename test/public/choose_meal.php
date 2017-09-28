<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE . DS . "header.php") ?>

<?php
    if (isset($_GET['cuisine']) && !empty($_GET['cuisine'])) {
        $items = get_products($_GET['cuisine']);
    }
?>
<!-- Page Content -->
<div class="container">
	<div class="row">
        <h2 class="text-center"><?= $items[0]['cat_name'];?></h2>
		<?php foreach($items as $item):?>
        <div class="col-md-4 text-center">

            <a class="product" href="#" data-toggle="modal" data-target="#<?= $item['item_id']; ?>">
                <img src="<?php echo $item['item_img']; ?>" class="img-responsive" alt="Image">
            </a>
            <h3><?= $item['item_name']; ?></h3>

            <div class="">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?= $item['item_id']; ?>">More info</button>
                 <span>&#8364; <?= $item['item_price']; ?></span>
			</div>


        </div>
    <?php endforeach; ?>
    </div>


<?php foreach($items as $item):?>
    <!-- Modal -->
<div id="<?= $item['item_id']; ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $item['item_name']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="">
                <img src="<?= $item['item_img']; ?>" class="img-responsive" alt="Image">
            </div>
        <p><?= $item['item_description']; ?></p>
        <p><?= $item['item_price']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--/Modal -->
<?php endforeach; ?>

</div>
<!-- /.container -->
<?php include(TEMPLATE . DS . "footer.php"); ?>