<?php require_once "inc/config.php"; ?>
<?php
$fName = $email = $lName = $pass = $confPass = '';
$firstNameErr = $emailErr = $lastNameErr = $passwordErr = $confirmPassErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['singup'])) {
	if (empty($_POST['firstName'])) {
		$firstNameErr = "Name is required";
	} else {
		$fName = clearString($_POST['firstName']);
	}
		if (empty($_POST['lastName'])) {
		$lastNameErr = "Last name is required";
	} else {
		$lName = clearString($_POST['lastName']);
	}
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
		$pass = clearString($_POST['password']);
	}
	if (empty($_POST['confirmPassword'])) {
		$confirmPassErr = "Confirm password is required";
	} else {
		$confPass = clearString($_POST['confirmPassword']);
	}
	if (!($pass === $confPass)) {
		$confirmPassErr = "Confirm and password are not equal!";
	}

	if ($fName && $lName && checkEmail($email) && $pass && $confPass && ($pass === $confPass)) {
		singup($fName, $lName, $email, $pass, $confPass);
	}
}
?>
<div class="singup">
	<h2><a href="index.php?page=login">Login</a> &Iota; <a class="active" href="index.php?page=singup">Sing Up</a></h2>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
	<form action="" method="POST">
		<label for="firstName">First name</label>
		<input type="text" name="firstName" id="firstName"  value="<?= $fName;?>">
		<span class="error"><?= $firstNameErr;?></span>
		<label for="lastName">Last name</label>
		<input type="text" name="lastName" id="lastName"  value="<?= $lName;?>">
		<span class="error"><?= $lastNameErr;?></span>
		<label for="email">Email address</label>
		<input type="email" name="email" id="email"  value="<?= $email;?>">
		<span class="error"><?= $emailErr;?></span>
		<label for="password">Password</label>
		<input type="password" name="password" id="password"  >
		<span class="error"><?= $passwordErr;?></span>
		<label for="confirmPassword">Confirm password</label>
		<input type="password" name="confirmPassword" id="confirmPassword" >
		<span class="error"><?= $confirmPassErr;?></span>
		<button type="submit" class="login-submit" name="singup">Sing up</button>
	</form>
</div>