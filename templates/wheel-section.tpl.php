

<style>

	.hs-master-label {
		width: 100%;
		height: 30px;
	}
	
	.daily-routine {
		background-color: rgba(217,77,32,1.0);
	}

</style>
<div style="margin: 0 auto; width: 90%; margin-top:50px; overflow:hidden;">

	<div class="<?php print $section; ?> hs-master-label">&nbsp;</div>

	<div id="list-header" class="list-header" style="margin-bottom: 50px;">
			<h1><?php print $title; ?></h1>
	</div>
	<p style="font-style:italic;">HighScope messaging for <?php print $title; ?>.</p>


	<ul>
	<?php foreach($links as $link): ?>
	
	
		<li><?php print $link; ?></li>
		
	
	<?php endforeach; ?>
	</ul>

	<img style="width:50%;" src="/content/themes/highscope/images/highscope-wheel-of-learning.png" />
	
	
	
	
	
	
	
</div>