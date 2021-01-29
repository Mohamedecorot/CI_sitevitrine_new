<?php if($this->session->userdata('username') != ''): ?>
    <?php
        echo '<h4>Les produits que vous ('.$this->session->userdata('username').') avez ajouté</h4>';
    ?>

    <p>
        <a href="<?php echo site_url('crud/data') ?>" class="btn btn-success">Retour en arrière</a>
        <a href="<?php echo site_url('crud/add') ?>" class="btn btn-dark">Ajouter un nouveau produit</a>
    </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Illustration</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($mydata == false) {
                    ?>
                        <div class="alert alert-danger">Les données sont encore vides !!!</div>
                    <?php
                } else {
                    $no = 1;
                    foreach ($mydata as $row) {
                ?>
                <tr>
                    <td><?php echo $row->nom ?></td>
                    <td><?php echo $row->description ?></td>
                    <td><?php echo $row->categorie ?></td>
                    <td><?php echo $row->illustration ?></td>
                    <td><?php echo $row->prix ?></td>
                    <td class="text-center">
                        <a href="<?php echo site_url('crud/edit/'.$row->id) ?>" class="btn btn-warning">Modifier</a>
                        <a href="<?php echo site_url('crud/del/'.$row->id) ?>" class="btn btn-danger" onclick="return confirm('êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

<?php else: ?>
    <div class="alert alert-danger">Vous n'avez pas accès à cette page</div>
    <?php redirect(base_url() . 'main/login'); ?>
<?php endif ?>