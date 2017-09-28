<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE . DS . "header.php"); ?>

<?php $categories = get_categories(); ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
    <?php foreach($categories as $cat):?>
        <div class="col-md-4 text-center">
            <h3><?= $cat['cat_name']?></h3>
            <a class="product" href="choose_meal.php?cuisine=<?= $cat['cat_id'];?>">
                <img src="<?= $cat['cat_img'];?>" class="img-responsive" alt="Image">
            </a>
        </div>
    <?php endforeach; ?>
    </div>

</div>
<!-- /.container -->
<?php include(TEMPLATE . DS . "footer.php"); ?>