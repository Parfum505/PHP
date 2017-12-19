<?php require "inc/config.php"; ?>
<?php
$email = $password = '';
$emailErr = $passwordErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['login'])) {
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
}

?>
<div class="login">
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
	<h2><a class="active" href="index.php?page=login">Login</a> &Iota; <a href="index.php?page=singup">Sing Up</a></h2>
	<form action="" method="POST" onsubmit="return validateLoginForm();">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" value="<?= $email;?>">
		<span class="error"><?= $emailErr;?></span>
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<span class="error"><?= $passwordErr;?></span>
		<button type="submit" class="btn login-submit" name="login">Login</button>
	</form>
	<p class="login-help"><a href="index.php?page=remindpassword">Forgot password?</a></p>

</div>