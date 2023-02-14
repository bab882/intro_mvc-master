<table>
    <thead>
        <tr>
            <th></th>
            <th>Titre</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
<div class="page-header">
    <h1>Ajouter une image</h1>
</div>
<form action="<?= Router::url('admin/medias/index/'. $post_id)?>" method="post" enctype="multipart/form-data">
    <?= $this->Form->input('file', 'Image', array('type' => 'file')); ?>
    <?= $this->Form->input('name', 'Titre'); ?>

    <div class="actions">
        <input type="submit" value="Envoyer" class="btn-primary">
    </div>
</form>