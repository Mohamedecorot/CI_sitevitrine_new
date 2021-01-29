<?php if($this->session->userdata('username') != ''): ?>

<?php
echo form_open_multipart('crud/update/'.$id, 'class="myform"');
?>

<div class="form-group">
    <?= form_label('Id du produit', 'id'); ?>
    <input type="text" name="id" id="id" class="form-control" value="<?= html_escape($id) ?>" readonly>
</div>

<div class="form-group">
    <?= form_label('Nom du produit', 'nom'); ?>
    <input type="text" name="nom" id="nom" class="form-control" value="<?= html_escape($nom) ?>">
    <?= form_error('nom', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?= form_label('Description du produit', 'description'); ?>
    <input type="text" name="description" id="description" class="form-control" value="<?= html_escape($description) ?>">
    <?= form_error('description', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?= form_label('Catégorie du produit', 'categorie'); ?>
    <input type="text" name="categorie" id="categorie" class="form-control" value="<?= html_escape($categorie) ?>">
    <?= form_error('categorie', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?= form_label('Prix du produit', 'prix'); ?>
    <input type="text" name="prix" id="prix" class="form-control" value="<?= html_escape($prix) ?>">
    <?= form_error('prix', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?= form_label('Voulez-vous modifier l\'illustration du produit ? (gif, jpg, png ou jpeg autorisé)', 'illustration'); ?>
    <input type="file" name="illustration" id="illustration" class="form-control"  value="<?php $illustration  ?>"/>
    <?php if (isset($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
</div>
<?php echo $illustration ?>

<input type="submit" name="edit" class="btn btn-primary" value="Mettre à jour">

<a href="<?= site_url('crud/data') ?>" class="btn btn-link">Revenir à l'administration des produits</a>

<?php
echo form_close();
?>

<?php else: ?>
<?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>