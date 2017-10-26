<?php require_once "inc/config.php"; ?>

<?php
$name = $email = $subject = $message = '';
$nameErr = $emailErr = $subjectErr = $messageErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
	if (empty($_POST['name'])) {
		$nameErr = "Name is required";
	} else {
		$name = clearString($_POST['name']);
	}
	if (empty($_POST['email'])) {
		$emailErr = "Email is required";
	} else {
		$email = clearString($_POST['email']);
		if(!checkEmail($email)) {
			$emailErr = "Invalid email format";
		}
	}
	if (empty($_POST['subject'])) {
		$subjectErr = "Subject is required";
	} else {
		$subject = clearString($_POST['subject']);
	}
	if (empty($_POST['message'])) {
		$messageErr = "Message is required";
	} else {
		$message = clearString($_POST['message']);
	}
	if ($name && checkEmail($email) && $subject && $message) {
		sendEmail($subject, $message, $email, $name);
	}
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
		<label for="name">Name </label>
		<input type="text" name="name" id="name" value="<?= $name;?>" required="require">
		<span class="error"><?= $nameErr;?></span>
		<label for="email">Email address </label>
		<input type="email" name="email" id="email" value="<?= $email;?>" required="require">
		<span class="error"><?= $emailErr;?></span>
		<label for="subject">Subject </label>
		<input type="text" name="subject" id="subject" value="<?= $subject;?>" required="require">
		<span class="error"><?= $subjectErr;?></span>
		<label for="message">Message </label>
		<textarea name="message" id="message" required="require"><?= $message;?></textarea>
		<span class="error"><?= $messageErr;?></span>
		<button type="submit" class="btn login-submit" name="send">Send</button>
	</form>
</div>