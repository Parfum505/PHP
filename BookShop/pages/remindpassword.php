<?php require "inc/config.php"; ?>
<?php
$email = '';
$remindEmailErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['remindPassword'])) {
		$sendPassword = true;
		if (empty($_POST['email'])) {
			$remindEmailErr = "Email is required";
			$sendPassword = false;
		} else {
			$email = clearString($_POST['email']);
			if(!checkEmail($email)) {
				$remindEmailErr = "Invalid email format";
				$sendPassword = false;
			} elseif (!userExist($email)) {
				$remindEmailErr = "No user with email: {$email}";
				$sendPassword = false;
			}
		}
		if($sendPassword){
			remindPassword($email);
		}
	}
}
?>
<div class="remindPassword">
	<h2>Forgot password?</h2>
	<p>Please fill in the form and we will send password on your email.</p>
	<form action="" method="POST">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" value="<?= $email;?>" required="require">
		<span class="error"><?= $remindEmailErr;?></span>
		<button type="submit" class="login-submit" name="remindPassword">Send password</button>
	</form>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
</div>