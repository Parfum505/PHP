<?php require_once("../resources/config.php"); ?>

<?php $item = get_single_product($_GET['id']);?>

<!-- Modal -->
<div id="<?= $item['item_id']; ?>" class="modal fade " role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $item[0]['item_name']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="">
                <img src="<?= $item[0]['item_img']; ?>" class="img-responsive" alt="Image">
            </div>
        <p><?= $item[0]['item_description']; ?></p>
        <p><?= $item[0]['item_price']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>