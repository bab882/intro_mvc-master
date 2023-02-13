<div class="page-header">
    <h1>Editer un article</h1>
</div>

<form action="<?= Router::url('admin/posts/edit') ?>" method="post">
   <?= $this->Form->input('name', 'titre'); ?>
</form>