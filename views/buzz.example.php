<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Buzzes</title>

	<style type="text/css">
	
	</style>

</head>
<body>
	<ul>
	<?php
	foreach ($posts as $post) {
		
	?>
	<li>
		<span class="date"><a href="<?=$post['href']?>" target="_BLANK" title="<?=$post['content']?>"><?=date('H:i d/m/y',strtotime($post['date']))?></a></span>
		<span class="text"><?=$post['content']?></span></a>
		<span class="author"><a href="<?=$post['author']->uri?>" target="_BLANK"><?=$post['author']->name?></a></span>
		<?php if (count($post['replies'])) { ?>
			<ul>
				<?php foreach ($post['replies'] as $reply) {
									?>
				<li>
					<span class="date"><?=date('H:i d/m/y',strtotime($reply['date']))?></span>
					<span class="text"><?=$reply['content']?></span>
					<span class="author"><a target="_BLANK" href="<?=$reply['author']->uri?>"><?=$reply['author']->name?></a></span>
				</li>
				<?php } ?>
			</ul>
		<?php } ?>
	</li>
	<?php
	}
	?>
	</ul>

</body>
</html>