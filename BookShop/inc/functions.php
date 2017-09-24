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

/*** Admin functions ***/