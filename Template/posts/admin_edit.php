<div class="page-header">
    <h1>Editer un article</h1>
</div>

<form action="<?= Router::url('admin/posts/edit') ?>" method="post">
   <?= $this->Form->input('name', 'titre'); ?>
   <?= $this->Form->input('content', 'contenu', array('type' => 'textarea',
                                                            'rows' => 30,
                                                                'cols' => 50
                                                    )); ?>
    <?= $this->Form->input('online', 'en ligne', array('type' => 'checkbox'));?>                                                
</form>