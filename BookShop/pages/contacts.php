<?php require_once "inc/config.php"; ?>

<?php

// if(isset($_POST['singup']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
// 		$fName = clearString($_POST['firstName']);
// 		$lName = clearString($_POST['lastName']);
// 		$email = clearString($_POST['email']);
// 		$pass = clearString($_POST['password']);
// 		$confPass = clearString($_POST['confirmPassword']);
			// singup($fName, $lName, $email, $pass, $confPass);
//	}
?>
<div class="contacts">
	<h2>Get in touch</h2>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
	<form action="" method="POST">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" required="require">
		<label for="subject">Subject </label>
		<input type="text" name="subject" id="subject" required="require">
		<label for="tel">Telephone</label>
		<input type="telephone" name="telephone" id="telephone" required="require">
		<label for="message">Message </label>
		<textarea name="message" id="message" required="require" placeholder="* Message"></textarea>
		<button type="submit" class="login-submit" name="send">Send</button>
	</form>
</div>