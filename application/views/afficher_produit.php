<div class="container">
	<div class="row my-3">
		<div class="col">
			<h1>Listes des produits</h1>
		</div>
		<form method="post">
			<div class="form-group" class="col-xs-2">
				<label for="tri">Trier par</label>
				<select name="post-order-by" class="input-medium" id="tri" onchange="this.form.submit();">
					<optgroup label="Prix">
						<option id="prix_asc" value="prix_asc" <?php if (($this->input->post('post-order-by')) == "prix_asc") {echo "selected";} ?>>Prix croissant</option>
						<option id="prix_desc" value="prix_desc" <?php if (($this->input->post('post-order-by')) == "prix_desc") {echo "selected";} ?>>Prix décroissant</option>
					</optgroup>
					<optgroup label="Catégorie">
						<option id="categorie_asc" value="categorie_asc" <?php if (($this->input->post('post-order-by')) == "categorie_asc") {echo "selected";} ?>>Catégorie croissante</option>
						<option id="categorie_desc" value="categorie_desc" <?php if (($this->input->post('post-order-by')) == "categorie_desc") {echo "selected";} ?>>Catégorie décroissante</option>
					</optgroup>
				</select>
			</div>
		</form>
	</div>
	<div class="row">
		<?php foreach($mydata as $produit): ?>
			<div class="col-12 col-lg-4">
				<div class="card mb-4 mb-lg-0">
					<a href="<?=base_url().'uploads/'.$produit->illustration;?>" target="_blank"><img src="<?=base_url().'uploads/'.$produit->illustration;?>" alt="" class="card-img-top" width="auto" height="250"></a>
					<div class="card-body">
						<h4 class="card-title"><?= htmlentities($produit->nom); ?></h4>
						<h6 class="card-text">Catégorie : <?= $produit->categorie; ?></h6>
						<p class="card-text"><?= $produit->description; ?></p>
						<p class="card-text">Prix : <?= $produit->prix; ?> €</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
