<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE . DS . "header.php") ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <h2 class="text-center">Lunch</h2>
        <div class="col-md-4 text-center">
            <h3>Polish</h3>
            <a class="product" href="lunch.php?cuisine=Polish">
                <img src="img/1.jpg" class="img-responsive" alt="Image">
            </a>
        </div>
        <div class="col-md-4 text-center">
            <h3>Mexican</h3>
            <a class="product" href="lunch.php?cuisine=Mexican">
                <img src="img/3.jpg" class="img-responsive" alt="Image">
            </a>
        </div>
        <div class="col-md-4 text-center">
            <h3>Italian</h3>
            <a class="product" href="lunch.php?cuisine=Italian">
                <img src="img/2.jpg" class="img-responsive" alt="Image">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center">
            <h2>Drinks</h2>
            <a class="product" href="drinks.php">
                <img src="img/drinks.jpg" class="img-responsive" alt="Image">
            </a>
        </div>
        <div class="col-md-6 text-center">
            <h2>Desserts</h2>
            <a class="product" href="dessert.php">
                <img src="img/8.jpg" class="img-responsive" alt="Image">
            </a>
        </div>
    </div>

</div>
<!-- /.container -->
<?php include(TEMPLATE . DS . "footer.php") ?>