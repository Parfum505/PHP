<?php require "inc/config.php"; ?>
<?php
	$email = $password = '';
	$emailErr = $passwordErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

	if (empty($_POST['email'])) {
		$emailErr = "Email is required";
	} else {
		$email = clearString($_POST['email']);
		if(!checkEmail($email)) {
			$emailErr = "Invalid email format";
		}
	}
	if (empty($_POST['password'])) {
		$passwordErr = "Password is required";
	} else {
		$password = clearString($_POST['password']);
	}

	if (checkEmail($email) && $password) {
		login($email, $password);;
	}
}

?>
<div class="login">
	<h2><a class="active" href="index.php?page=login">Login</a> &Iota; <a href="index.php?page=singup">Sing Up</a></h2>
	<form action="" method="POST">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" value="<?= $email;?>" required="require">
		<span class="error"><?= $emailErr;?></span>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required="require">
		<span class="error"><?= $passwordErr;?></span>
		<button type="submit" class="login-submit" name="login">Login</button>
	</form>
	<p class="login-help"><a href="#">Forgot password?</a></p>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
</div>