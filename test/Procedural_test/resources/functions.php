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
            $arr = array_slice($cart, 1);
            foreach ($arr as $value) {
                $count += (int)$value['qu'];
            }
        }
    }
function saveToCart(){
        global $cart;
        $str = base64_encode(serialize($cart));
        setcookie('cart', $str, 0x7FFFFFFF);
    }
function updateCart($id, $qu = 1){
        global $cart;
        $cart[$id]['qu'] = (int)$qu >= 1? (int)$qu : 1;
        saveToCart();
    }

function add2Cart($id, $qu = 1, $lemon = '', $ice = ''){
        global $cart;
        $qu = $qu >= 1? (int)$qu : 1;
        if (array_key_exists($id, $cart)) {
            $cart[$id]['qu'] = $cart[$id]['qu'] + $qu;
        } else {
            $cart[$id]['qu'] = $qu;
        }
        $cart[$id]['lemon'] = $lemon;
        $cart[$id]['ice'] = $ice;
        saveToCart();
    }
function deleteItemFromCart($id){
        global $cart;
        unset($cart[$id]);
        saveToCart();
    }
function protect($a){
    global $connection;
    return mysqli_real_escape_string($connection, $a);
}
function myCart(){
        global $connection, $cart;
        $goods = array_keys($cart);
        array_shift($goods);
        if (!$goods) {
            return false;
        }
        $goods= array_map("protect", $goods);
        $ids = implode(",", $goods);
        $sql = "SELECT * FROM items
        LEFT JOIN category ON cat_id = item_cat_id
        WHERE item_id IN ($ids)";
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
            $row['quantity'] = $cart[$row['item_id']]['qu'];
            $row['lemon'] = $cart[$row['item_id']]['lemon'];
            $row['ice'] = $cart[$row['item_id']]['ice'];
            $arr[] = $row;
        }
        return $arr;
    }

 ?>