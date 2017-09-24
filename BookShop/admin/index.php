<?php
// require_once "secure/session.inc.php";
// require_once "secure/secure.inc.php";
require_once "../inc/config.inc.php";
// if(isset($_GET['logout'])) {
// 	logOut();
// }
?>
<?php $title = "Admin"; ?>
<?php include_once (COMMON_PAGES . "header.php"); ?>


<div class="container">
	<h1>Administration of the e-shop</h1>
	<div class="row">
<?php include_once (COMMON_PAGES . "aside_admin.php"); ?>
<main>
	<article>
		<header>
			<h1>article header h1</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.
			</p>
		</header>
		<section>
			<h2>article section h2</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam ullamcorper lorem dapibus velit suscipit ultrices. Proin in est sed erat facilisis pharetra.
			</p>
		</section>
	</article>
</main>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
<?php include_once (COMMON_PAGES . "footer.php"); ?>