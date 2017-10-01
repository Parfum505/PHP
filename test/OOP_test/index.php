<?php require_once("resources/config.php"); ?>

<?php include_once(TEMPLATE . DS . "header.php"); ?>


<!-- Page Content -->
<?php
    if (isset($_GET['menu'])) {
        include_once("pages/choose_meal.php");
    } else if (isset($_GET['cart'])){
        include_once("pages/cart.php");
    } else {
        include_once("pages/main.php");
    }

?>

<?php include_once(TEMPLATE . DS . "footer.php"); ?>