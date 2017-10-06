<?php require "inc/config.php"; ?>
<?php

if(isset($_POST['singup']) && !empty($_POST['email']) && !empty($_POST['password'])){
			singup($_POST['email'], $_POST['password']); } ?>
<div class="singup">
	<h2><a href="index.php?page=login">Login</a> &Iota; <a class="active" href="index.php?page=singup">Sing Up</a></h2>
	<form action="" method="POST">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email">
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<button type="submit" class="login-submit" name="login">Sing up</button>
	</form>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
</div>