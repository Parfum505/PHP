<?php require "inc/config.php"; ?>
<?php
$fName = $email = $lName = $pass = $confPass = '';
$firstNameErr = $emailErr = $lastNameErr = $passwordErr = $confirmPassErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['singup'])) {
	$singup = true;
	if (empty($_POST['firstName'])) {
		$firstNameErr = "Name is required";
		$singup = false;
	} else {
		$fName = clearString($_POST['firstName']);
	}
	if (empty($_POST['lastName'])) {
		$lastNameErr = "Last name is required";
		$singup = false;
	} else {
		$lName = clearString($_POST['lastName']);
	}
	if (empty($_POST['email'])) {
		$emailErr = "Email is required";
		$singup = false;
	} else {
		$email = clearString($_POST['email']);
		if(!checkEmail($email)) {
			$emailErr = "Invalid email format";
			$singup = false;
		} elseif (userExist($email)) {
				$emailErr = "Email {$email} already used";
				$singup = false;
		}
	}
	if (empty($_POST['password'])) {
		$passwordErr = "Password is required";
		$singup = false;
	} else {
		$pass = clearString($_POST['password']);
	}
	if (empty($_POST['confirmPassword'])) {
		$confirmPassErr = "Confirm password is required";
		$singup = false;
	} else {
		$confPass = clearString($_POST['confirmPassword']);
	}
	if (!($pass === $confPass)) {
		$confirmPassErr = "Confirm and password are not equal!";
		$singup = false;
	}

	if ($singup) {
		singup($fName, $lName, $email, $pass);
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
		<input type="text" name="firstName" id="firstName" required="require" value="<?= $fName;?>">
		<span class="error"><?= $firstNameErr;?></span>
		<label for="lastName">Last name</label>
		<input type="text" name="lastName" id="lastName" required="require" value="<?= $lName;?>">
		<span class="error"><?= $lastNameErr;?></span>
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" required="require" value="<?= $email;?>">
		<span class="error"><?= $emailErr;?></span>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required="require" >
		<span class="error"><?= $passwordErr;?></span>
		<label for="confirmPassword">Confirm password</label>
		<input type="password" name="confirmPassword" id="confirmPassword" required="require">
		<span class="error"><?= $confirmPassErr;?></span>
		<button type="submit" class="btn login-submit" name="singup">Sing up</button>
	</form>
</div>