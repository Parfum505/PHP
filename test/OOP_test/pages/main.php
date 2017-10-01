
<?php $categories = get_categories(); ?>


<div class="container">
    <div class="row">
    <?php foreach($categories as $cat):?>
        <div class="col-md-4 text-center">
            <h3><?= $cat['cat_name'] ?></h3>
            <a class="product_link" href="index.php?menu=<?= $cat['cat_name'];?>">
                <img src="<?= $cat['cat_img'];?>" class="img-responsive" alt="Image">
            </a>
        </div>
    <?php endforeach; ?>
    </div>

</div>
<!-- /.container -->