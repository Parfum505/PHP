<?php require "inc/config.php"; ?>
<?php

if(isset($_POST['singup']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
		$fName = clearString($_POST['firstName']);
		$lName = clearString($_POST['lastName']);
		$email = clearString($_POST['email']);
		$pass = clearString($_POST['password']);
		$confPass = clearString($_POST['confirmPassword']);
			singup($fName, $lName, $email, $pass, $confPass);
	} ?>
<div class="singup">
	<h2><a href="index.php?page=login">Login</a> &Iota; <a class="active" href="index.php?page=singup">Sing Up</a></h2>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
	<form action="" method="POST">
		<label for="firstName">First name</label>
		<input type="text" name="firstName" id="firstName" required="require" value="<?= isset($_POST['firstName'])? $_POST['firstName']: '';?>">
		<label for="lastName">Last name</label>
		<input type="text" name="lastName" id="lastName" required="require" value="<?= isset($_POST['lastName'])? $_POST['lastName']: '';?>">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" required="require" value="<?= isset($_POST['email'])? $_POST['email']: '';?>">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required="require">
		<label for="confirmPassword">Confirm password</label>
		<input type="password" name="confirmPassword" id="confirmPassword" required="require">
		<button type="submit" class="login-submit" name="singup">Sing up</button>
	</form>
</div>