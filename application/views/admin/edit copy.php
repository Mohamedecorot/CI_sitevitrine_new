<?php if($this->session->userdata('username') != ''): ?>

    <?php
    echo form_open('crud/update', 'class="myform"');
    ?>

    <div class="form-group">
        <label for="id">ID du produit</label>
        <input type="text" name="id" id="id" class="form-control" value="<?php echo $id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom ?>">
    </div>
    <div class="form-group">
        <label for="description">Description du produit</label>
        <input type="text" name="description" id="description" class="form-control" value="<?php echo $description ?>">
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie du produit</label>
        <input type="text" name="categorie" id="categorie" class="form-control" value="<?php echo $categorie ?>">
    </div>
    <div class="form-group">
        <label for="illustration">Illustration du produit</label>
        <input type="text" name="illustration" id="illustration" class="form-control" value="<?php echo $illustration ?>">
    </div>
    <div class="form-group">
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" id="prix" class="form-control" value="<?php echo $prix ?>">
    </div>
    <input type="submit" name="edit" class="btn btn-primary" value="Update">
    <a href="<?php echo site_url('crud') ?>" class="btn btn-link">Retour en arrière</a>
    <?php
    echo form_close();
    ?>

<?php else: ?>
    <div class="alert alert-danger">Vous n'avez pas accès à cette page</div>
    <?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>