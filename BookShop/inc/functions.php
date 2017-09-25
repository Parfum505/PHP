<?php

/*** Shop functions ***/
function show_categories(){
	global $link;
	$query = "SELECT * FROM categories";
	$res = mysqli_query($link, $query);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<li><a href='catalog.php?id=".$row['cat_id']. "'>".$row['cat_title']."</a></li>";
	}
}
function get_products(){
	global $link;
	$query = "SELECT * FROM products";
	$res = mysqli_query($link, $query);
	if (!$res) {
		die("Error: " . mysqli_error($link));
	}
	$products = "";
	while ($row = mysqli_fetch_assoc($res)) {
		$products .= "<a class='product' href='item.php?id=".$row['prod_id']."'>";
		$products .= "<img src='".$row['prod_img']."' alt='".$row['prod_title']."'>";
		$products .= "<p>".$row['prod_title']."</p>";
		$products .= "<p>".$row['prod_author']."</p>";
		$products .= "<p>".$row['prod_description']."</p>";
		$products .= "<p>&#8364; ".$row['prod_price']."</p>";
		$products .= "</a>";
	}
	echo $products;
}
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

	return $item;
}

/*** Admin functions ***/