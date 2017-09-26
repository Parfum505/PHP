<?php

/*** Shop functions ***/
function show_nav_categories(){
	global $link;
	$query = "SELECT * FROM categories";
	$res = mysqli_query($link, $query);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<li><a href='category.php?id=".$row['cat_id']. "'>".$row['cat_title']."</a></li>";
	}
	mysqli_free_result($res);
}
function show_category_items($cat_id){
	global $link;
	(int)$cat_id;
	$cat_id = mysqli_real_escape_string($link, $cat_id);
	$query = "SELECT * FROM products WHERE prod_cat_id = '$cat_id' ";
	$res = mysqli_query($link, $query);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	$category_items = mysqli_fetch_all($res, MYSQLI_ASSOC);
	mysqli_free_result($res);
	return $category_items;
}
// function show_products(){
// 	global $link;
// 	$query = "SELECT * FROM products";
// 	$res = mysqli_query($link, $query);
// 	if (!$res) {
// 		die("Error: " . mysqli_error($link));
// 	}
// 	$products = "";
// 	while ($row = mysqli_fetch_assoc($res)) {
// 		$products .= "<a class='product' href='item.php?id=".$row['prod_id']."'>";
// 		$products .= "<img src='".$row['prod_img']."' alt='".$row['prod_title']."'>";
// 		$products .= "<p>".$row['prod_title']."</p>";
// 		$products .= "<p>".$row['prod_author']."</p>";
// 		$products .= "<p>".$row['prod_description']."</p>";
// 		$products .= "<p>&#8364; ".$row['prod_price']."</p>";
// 		$products .= "<a href='cart.php?id=".$row['prod_id'].">Add to cart</a>";
// 		$products .= "</a>";
// 	}
// 	mysqli_free_result($res);
// 	echo $products;
// }
function show_item_page($id){
	global $link;
	(int)$id;
	$id = mysqli_real_escape_string($link, $id);
	$query = "SELECT * FROM products WHERE prod_id = '$id' ";
	$res = mysqli_query($link, $query);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	$item = mysqli_fetch_all($res, MYSQLI_ASSOC);
	mysqli_free_result($res);
	return $item;
}

/*** Admin functions ***/