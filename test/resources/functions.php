<?php

function get_products($category) {
global $connection;

$query = " SELECT * FROM items JOIN category ON item_cat_id = cat_id
WHERE cat_name = '$category' ";

$res = mysqli_query($connection, $query);
if(!$res){
    die('Error: ' . mysql_error($connection));
}

$items = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);

return $items;
}



 ?>