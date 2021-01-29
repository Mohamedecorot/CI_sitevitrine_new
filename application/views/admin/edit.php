<?php if($this->session->userdata('username') != ''): ?>

<?php
echo form_open_multipart('crud/update/'.$id, 'class="myform"');
?>

<div class="form-group">
    <?php echo form_label('Id du produit', 'id'); ?>
    <input type="text" name="id" id="id" class="form-control" value="<?php echo $id ?>" readonly>
</div>

<div class="form-group">
    <?php echo form_label('Nom du produit', 'nom'); ?>
    <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom ?>">
    <?php echo form_error('nom', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Description du produit', 'description'); ?>
    <input type="text" name="description" id="description" class="form-control" value="<?php echo $description ?>">
    <?php echo form_error('description', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Catégorie du produit', 'categorie'); ?>
    <input type="text" name="categorie" id="categorie" class="form-control" value="<?php echo $categorie ?>">
    <?php echo form_error('categorie', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Prix du produit', 'prix'); ?>
    <input type="text" name="prix" id="prix" class="form-control" value="<?php echo $prix ?>">
    <?php echo form_error('prix', '<p class="error">', '</p>'); ?>
</div>

<div class="form-group">
    <?php echo form_label('Selectionnez une image du produit (gif, jpg, png, jpeg)', 'illustration'); ?>
    <input type="file" name="illustration" id="illustration" class="form-control"  value="<?php $illustration ?>"/>
    <?php if (isset($error)) { echo '<div class="error">' . $error . '</div>'; } ?>
</div>
<input type="submit" name="edit" class="btn btn-primary" value="Mettre à jour">

<a href="<?php echo site_url('crud/data') ?>" class="btn btn-link">Retour en arrière</a>

<?php
echo form_close();
?>

<?php else: ?>
<?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>