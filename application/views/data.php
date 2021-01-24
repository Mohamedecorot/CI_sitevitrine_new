    <p>
        <a href="<?php echo site_url('crud/add') ?>" class="btn btn-primary">Ajouter un nouveau produit</a>
    </p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nom</th>
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
                        <div class="alert alert-info">les données sont encore vides, veuillez d'abord remplir</div>
                    <?php
                } else {
                    $no = 1;
                    foreach ($mydata as $row) {
                ?>
                <tr>
                    <td><?php echo $no ++ ?></td>
                    <td><?php echo $row->nom ?></td>
                    <td><?php echo $row->description ?></td>
                    <td><?php echo $row->categorie ?></td>
                    <td><?php echo $row->illustration ?></td>
                    <td><?php echo $row->prix ?></td>
                    <td class="text-center">
                        <a href="<?php echo site_url('crud/choisir/'.$row->id) ?>" class="btn btn-warning">Modifier</a>
                        <a href="<?php echo site_url('crud/del/'.$row->id) ?>" class="btn btn-danger" onclick="return confirm('êtes-vous sûr ?')">Supprimer</a>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>