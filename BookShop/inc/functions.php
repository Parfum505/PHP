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
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<a class='product' href='catalog.php?id=".$row['prod_id']."'>";
		echo "<img src='".$row['prod_img']."' alt='".$row['prod_title']."'>";
		echo "<p>".$row['prod_title']."</p>";
		echo "<p>".$row['prod_author']."</p>";
		echo "<p>".$row['prod_description']."</p>";
		echo "<p>".$row['prod_price']."</p>";
		echo "</a>";
	}
}

/*** Admin functions ***/