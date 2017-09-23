<?php
// require_once "secure/session.inc.php";
// require_once "secure/secure.inc.php";

// if(isset($_GET['logout'])) {
// 	logOut();
// }
?>
<?php $title = "Admin"; ?>
<?php require_once "../common_pages/header.php"; ?>



<div class="container">
	<h1>Administration of the e-shop</h1>
	<aside>
		<h3>Action options:</h3>
		<ul>
			<li>
				<a href='add2cat.php'>Adding items to the catalog</a>
			</li>
			<li>
				<a href='orders.php'>See orders</a>
			</li>
			<li>
				<a href='secure/create_user.php'>Adding users</a>
			</li>
			<li>
				<a href='index.php?logout'>Log out</a>
			</li>
		</ul>
	</aside>
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
	<?php include_once "../pages/terms_conditions.php"; ?>

</div>
<!-- /.container -->
<?php require_once "../common_pages/footer.php"; ?>