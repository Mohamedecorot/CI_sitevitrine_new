<?php if($this->session->userdata('username') != ''): ?>

<?php
echo form_open_multipart('crud/save', 'class="myform"');
?>

<div class="form-group">
    <?= form_label('Nom du produit', 'nom'); ?>
    <input type="text" name="nom" id="nom" class="form-control" value="<?= html_escape(set_value('nom')); ?>" placeholder="Entrez le nom du produit">
    <small><small><?= form_error('nom', '<p class="error">', '</p>'); ?></small></small>
</div>

<div class="form-group">
    <?= form_label('Description du produit', 'description'); ?>
    <input type="text" name="description" id="description" value="<?= html_escape(set_value('description')); ?>" class="form-control" placeholder="Entrez la description du produit">
    <small><small><?= form_error('description', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?= form_label('Catégorie du produit', 'categorie'); ?>
    <input type="text" name="categorie" id="categorie" value="<?= html_escape(set_value('categorie')); ?>" class="form-control" placeholder="Entrez la categorie du produit">
    <small><?= form_error('categorie', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?= form_label('Prix du produit', 'prix'); ?>
    <input type="number" name="prix" id="prix" value="<?= html_escape(set_value('prix')); ?>" class="form-control" placeholder="Entrez le prix du produit">
    <small><?= form_error('prix', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?= form_label('Selectionnez une image du produit (gif, jpg, png, jpeg)', 'illustration'); ?>
    <input type="file" name="illustration" class="form-control"  id="illustration"/>
    <?php if (isset($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
</div>

<input type="submit" name="save" class="btn btn-primary" value="save">

<a href="<?= site_url('crud/data') ?>" class="btn btn-link">Revenir à l'administration des produits</a>

<?php
echo form_close();
?>

<?php else: ?>
<?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>