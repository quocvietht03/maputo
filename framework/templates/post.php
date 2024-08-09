<article <?php post_class('bt-post'); ?>>
	<div class="bt-post--featured-wrap">
		<?php echo maputo_post_featured_render('full'); 
			echo maputo_post_category_render();
		?>
	</div>
	<div class="bt-post--infor">
	<?php
	echo maputo_post_publish_render();
	if (is_single()) {
		echo maputo_single_post_title_render();
	} else {
		echo maputo_post_title_render();
	}
	echo maputo_post_meta_render();
	?>
	</div>
	<?php
	echo maputo_post_content_render();
	?>
</article>