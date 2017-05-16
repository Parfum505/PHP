<?php
	include_once "data/database.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ToDo App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- <script src="js/lib/jquery-1.11.0.min.js"></script> -->
	<script src="JS/script.js"></script>
</head>
<body>
	<div class="container">
		<h1>To-Do List <span class="title">with PHP</span><i class="fa fa-plus"></i></h1>
		<div class="form">
			<input type="text" name="text" placeholder="Add New To-Do">
		</div>
		<ul>
			<li><span><i class="fa fa-trash"></i></span>Learn PHP</li>
			<li><span><i class="fa fa-trash"></i></span>Learn JS</li>
			<li><span><i class="fa fa-trash"></i></span>Learn CSS</li>
		</ul>
	</div>
</body>

</html>