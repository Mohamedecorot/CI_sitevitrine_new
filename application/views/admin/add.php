<?php if($this->session->userdata('username') != ''): ?>

    <div style="color:red">
        <?php echo validation_errors(); ?>
        <?php if(isset($error)){print $error;}?>
    </div>

    <?php
    echo form_open_multipart('crud/save', 'class="myform"');
    ?>

    <div class="form-group">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" class="form-control" value="<?= set_value('nom'); ?>" placeholder="Entrez le nom du produit">
    </div>
    <div class="form-group">
        <label for="description">Description du produit</label>
        <input type="text" name="description" id="description" value="<?= set_value('description'); ?>" class="form-control" placeholder="Entrez la description du produit">
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie du produit</label>
        <input type="text" name="categorie" id="categorie" value="<?= set_value('categorie'); ?>" class="form-control" placeholder="Entrez la categorie du produit">
    </div>

    <div class="form-group">
        <label for="illustration">Selectionnez une image du produit</label>
        <input type="file" name="illustration" class="form-control"  id="illustration"/>
    </div>

    <div class="form-group">
        <label for="prix">Prix du produit</label>
        <input type="number" name="prix" id="prix" value="<?= set_value('prix'); ?>" class="form-control" placeholder="Entrez le prix du produit">
    </div>
    <input type="submit" name="save" class="btn btn-primary" value="save">
    <a href="<?php echo site_url('crud/data') ?>" class="btn btn-link">Revenir à la liste des produits</a>

    <?php
    echo form_close();
    ?>

<?php else: ?>
    <div class="alert alert-danger">Vous n'avez pas accès à cette page</div>
    <?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>