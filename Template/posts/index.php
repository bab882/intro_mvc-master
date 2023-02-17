<div class="row">
	<div class="span13">
		<div class="page-header">
			<h1><?php echo isset($title)?$title:'Le blog'; ?></h1>
		</div>
		<?php foreach ($posts as $k => $v): ?>
		<div class="clearfix">
			<h3><?php echo $v->name; ?><small>,<a href="<?php echo Router::url('posts/category/slug:'.$v->catslug); ?>"><?php echo $v->catname; ?></a></small></h3>
			<?php echo substr(strip_tags($v->content),0,300); ?>...
		</div>
		<p style="text-align:right"><a href="<?php echo Router::url("posts/view/id:{$v->id}/slug:$v->slug"); ?>">Lire la suite &rarr;</a></p>
		<p>&nbsp;</p>
		<?php endforeach ?>

		<div class="pagination">
		  <ul>
		  <?php for($i=1; $i <= $page; $i++): ?>
		    <li <?php if($i==$this->request->page) echo 'class="active"'; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
		  <?php endfor; ?>
		  </ul>
		</div>
	</div>
	<?php require('sidebar.php'); ?>
</div>