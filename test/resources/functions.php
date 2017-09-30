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
WHERE cat_name LIKE '$cat_id%' ";
$res = mysqli_query($connection, $query);
if(!$res){
    die('Error: ' . mysql_error($connection));
}
$items = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);

return $items;
}
function cartInit(){
        global $cart, $count;
        if(!isset($_COOKIE['cart'])){
            $cart = ['orderId' => uniqid('', true)];
            saveToCart();
        }else{
            $cart = unserialize(base64_decode($_COOKIE['cart']));
            $count = array_slice($cart, 1);
            // print_r($count);
            $count = array_sum($count);
        }
    }
function saveToCart(){
        global $cart;
        $str = base64_encode(serialize($cart));
        setcookie('cart', $str, 0x7FFFFFFF);
    }
function updateCart($id, $qu = 1){
        global $cart;
        $cart[$id] = (int)$qu >= 1? (int)$qu : 1;
        saveToCart();
    }

function add2Cart($id, $qu = 1){
        global $cart;
        $qu = $qu >= 1? (int)$qu : 1;
        if (array_key_exists($id, $cart)) {
            $cart[$id] = $cart[$id] + $qu;
        } else {
            $cart[$id] = $qu;
        }
        saveToCart();
    }
function deleteItemFromCart($id){
        global $cart;
        unset($cart[$id]);
        saveToCart();
    }
function myCart(){
        global $connection, $cart;
        $goods = array_keys($cart);
        array_shift($goods);
        if (!$goods) {
            return false;
        }
        $ids = implode(",", $goods);
        $sql = "SELECT * FROM items WHERE item_id IN ($ids)";
        if (!$result = mysqli_query($connection, $sql)) {
            return false;
        }
        $items = addQuantity2Cart($result);
        mysqli_free_result($result);
        return $items;
    }
function addQuantity2Cart($data){
        global $cart;
        $arr = [];
        while ($row = mysqli_fetch_assoc($data)) {
            $row['quantity'] = $cart[$row['item_id']];
            $arr[] = $row;
        }
        return $arr;
    }

 ?>