<?php require_once "inc/config.php"; ?>

<?php

if(isset($_POST['send']) && !empty($_POST['subject']) && !empty($_POST['message']) && !empty($_POST['email']) && !empty($_POST['name'])){
		$subject = clearString($_POST['subject']);
		$message = clearString($_POST['message']);
		$email = clearString($_POST['email']);
		$name = clearString($_POST['name']);
		sendEmail($subject, $message, $email, $name);
	}
?>
<div class="contacts">
	<h2>Get in touch</h2>
	<p class="message">
		<?php if(isset($_SESSION['message'])){
			showMessage();
			} ?>
	</p>
	<form action="" method="POST">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" required="require">
		<label for="email">Email address</label>
		<input type="email" name="email" id="email" required="require">
		<label for="subject">Subject </label>
		<input type="text" name="subject" id="subject" required="require">
		<label for="message">Message </label>
		<textarea name="message" id="message" required="require" placeholder="* Message"></textarea>
		<button type="submit" class="login-submit" name="send">Send</button>
	</form>
</div>