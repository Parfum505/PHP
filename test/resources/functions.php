<?php

function get_categories() {
global $connection;

$query = "SELECT * FROM category";
$res = mysqli_query($connection, $query);
if(!$res){
    die('Error: ' . mysql_error($connection));
}

$items = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);

return $items;
}

function get_products($cat_id) {
global $connection;
(int)(trim($cat_id));
$cat_id = mysqli_real_escape_string($connection, $cat_id);
$query = " SELECT * FROM items JOIN category ON item_cat_id = cat_id
WHERE cat_id = '$cat_id' ";
$res = mysqli_query($connection, $query);
if(!$res){
    die('Error: ' . mysql_error($connection));
}

$items = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);

return $items;
}
function get_single_product($id) {
global $connection;
(int)(trim($id));
$id = mysqli_real_escape_string($connection, $id);
$query = " SELECT * FROM items WHERE item_id = '$id' ";
$res = mysqli_query($connection, $query);
if(!$res){
    die('Error: ' . mysql_error($connection));
}

$items = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);

return $items;
}



 ?>