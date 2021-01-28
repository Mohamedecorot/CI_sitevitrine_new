<?php if($this->session->userdata('username') != ''): ?>

<?php
echo form_open_multipart('crud/save', 'class="myform"');
?>

<div class="form-group">
    <?php echo form_label('Nom du produit', 'nom'); ?>
    <input type="text" name="nom" id="nom" class="form-control" value="<?= set_value('nom'); ?>" placeholder="Entrez le nom du produit">
    <small><small><?php echo form_error('nom', '<p class="error">', '</p>'); ?></small></small>
</div>

<div class="form-group">
    <?php echo form_label('Description du produit', 'description'); ?>
    <input type="text" name="description" id="description" value="<?= set_value('description'); ?>" class="form-control" placeholder="Entrez la description du produit">
    <small><small><?php echo form_error('description', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?php echo form_label('Catégorie du produit', 'categorie'); ?>
    <input type="text" name="categorie" id="categorie" value="<?= set_value('categorie'); ?>" class="form-control" placeholder="Entrez la categorie du produit">
    <small><?php echo form_error('categorie', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?php echo form_label('Prix du produit', 'prix'); ?>
    <input type="number" name="prix" id="prix" value="<?= set_value('prix'); ?>" class="form-control" placeholder="Entrez le prix du produit">
    <small><?php echo form_error('prix', '<p class="error">', '</p>'); ?></small>
</div>

<div class="form-group">
    <?php echo form_label('Selectionnez une image du produit (gif, jpg, png, jpeg)', 'illustration'); ?>
    <input type="file" name="illustration" class="form-control"  id="illustration"/>
    <?php if (isset($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
</div>

<input type="submit" name="save" class="btn btn-primary" value="save">

<a href="<?php echo site_url('crud/data') ?>" class="btn btn-link">Revenir à la liste des produits</a>

<?php
echo form_close();
?>

<?php else: ?>
<?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>