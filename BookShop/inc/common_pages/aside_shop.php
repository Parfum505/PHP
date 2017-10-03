
<aside class="aside_nav">
	<h3>Categories:</h3>
	<nav>
	<ul>
	<?php	$links = show_nav_categories(); ?>
	<?php	if($link): ?>
		<?php	foreach ($links as $link):?>
				<li><a href="index.php?page=category&id=<?= $link['cat_id'] ?>"><?= $link['cat_title'] ?></a></li>
		<?php endforeach ;?>
	<?php endif ;?>
	</ul>
	</nav>
</aside>

