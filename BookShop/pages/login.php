<?php session_start(); ?>
<?php require "inc/config.php"; ?>
<?php

if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])){
			login($_POST['email'], $_POST['password']); } ?>
<div class="login">
	<h2><a clacc="active" href="index.php?login">Login</a><a href="index.php?singup">Sing Up</a></h2>
	<form action="" method="POST">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<button type="submit" name="login">Login</button>
	</form>
	<p>
		<?php if(isset($_SESSION['message'])){
			echo showMessage();
			} ?>
	</p>
</div>