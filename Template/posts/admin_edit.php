<div class="page-header">
    <h1>Editer un article</h1>
</div>

<form action="<?= Router::url('admin/posts/edit') ?>" method="post">
   <?= $this->Form->input('name', 'titre'); ?>
   <?= $this->Form->input('content', 'contenu', array('type' => 'textarea',
                                                            'row' => 5,
                                                                'col' => 10
                                                    )); ?>
</form>