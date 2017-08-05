<?php
	require_once "data/database.php";
	require_once "data/functions.php";

	$todoList = getToDO($con);
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
	<script src="js/script.js"></script>
</head>
<body>
	<div class="container">
		<h1>To-Do List <span class="title">with PHP</span><i class="fa fa-plus"></i></h1>
		<?php if(isset($_GET["error"])) : ?>
			<p class='error'><?= $_GET["error"]; ?></p>
		<?php endif; ?>
		<div class="form">
			<form name="todo" action="data/functions.php" method="POST">
			<input type="text" name="name" placeholder="Add New To-Do">
			</form>
		</div>
		<ul>
			<?php foreach ($todoList as $value):?>
					<?php $completed = $value["done"] ? 'completed': ''; ?>
			<li class= <?= $completed?> >
				<span class="trash" id="<?=$value["id"]?>">
					<i class='fa fa-trash'></i>
				</span>
				<?=$value["name"]?>
				<div class="date">
					<p>added: <?=$value["start_date"]?></p>
					<p class="done">
						<?php if ($value["done"]) {
							echo 'done: '.$value["done"];
							}
						?>
					</p>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</body>

</html>