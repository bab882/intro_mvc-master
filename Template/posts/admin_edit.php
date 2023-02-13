<div class="page-header">
    <h1>Editer un article</h1>
</div>

<form action="<?= Router::url('admin/posts/edit') ?>" method="post">
   <?= $this->Form->input('name', 'titre'); ?>
   <?= $this->Form->input('slug', 'slug'); ?>
   <?= $this->Form->input('id', 'hidden'); ?>
   <?= $this->Form->input('content', 'contenu', array('type' => 'textarea',
                                                            'rows' => 8,
                                                                'cols' => 10
                                                    )); ?>
    <?= $this->Form->input('online', 'en ligne', array('type' => 'checkbox'));?>  

    <div class="action">
        <input type="submit" class="btn-primary" value="Envoyer">
    </div>                                              
</form>