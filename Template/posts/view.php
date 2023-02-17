<?php $title_for_layout = $post->name; ?>
<div class="row">
	<div class="span13">
		<div class="page-header">
			<h1><?php echo $post->name; ?>, <small><a href="<?php echo Router::url('posts/category/slug:'.$post->catslug); ?>"><?php echo $post->catname; ?></a></small></h1>
		</div>
		<?php echo $post->content; ?>
	</div>
	<?php require('sidebar.php'); ?>
</div>

