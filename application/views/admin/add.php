<?php if($this->session->userdata('username') != ''): ?>

    <?php
    echo form_open('crud/save', 'class="myform"');
    ?>

    <div class="form-group">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom du produit">
    </div>
    <div class="form-group">
        <label for="description">Description du produit</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Entrez la description du produit">
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie du produit</label>
        <input type="text" name="categorie" id="categorie" class="form-control" placeholder="Entrez la categorie du produit">
    </div>
    <div class="form-group">
        <label for="illustration">Illustration du produit</label>
        <input type="file" name="illustration" id="illustration" class="form-control" placeholder="Sélectionnez une illustration du produit">
    </div>
    <div class="form-group">
        <label for="prix">Prix du produit</label>
        <input type="number" name="prix" id="prix" class="form-control" placeholder="Entrez le prix du produit">
    </div>
    <input type="submit" name="save" class="btn btn-primary" value="save">
    <a href="<?php echo site_url('crud') ?>" class="btn btn-link">Revenir à la liste des produits</a>

    <?php
    echo form_close();
    ?>

<?php else: ?>
    <div class="alert alert-danger">Vous n'avez pas accès à cette page</div>
    <?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>