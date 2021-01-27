<div class="container">
	<div class="row my-3">
		<div class="col">
			<h1>Listes des produits</h1>
		</div>
		<form method="post">
			<label class="form-check form-check-inline">
				<input type="radio" name="post-order-by" id="categorie_asc" class="form-check-input" value="categorie_asc" required onchange="this.form.submit();" <?php if (($this->input->post('post-order-by')) == "categorie_asc") {echo "checked";} ?>>
				<span>categorie (A->Z)</span>
			</label>
			<label class="form-check form-check-inline">
				<input type="radio" name="post-order-by" id="categorie_desc" class="form-check-input" value="categorie_desc" required onchange="this.form.submit();" <?php if (($this->input->post('post-order-by')) == "categorie_desc") {echo "checked";} ?>>
				<span>categorie (Z->A)</span>
			</label>
			<label class="form-check form-check-inline">
				<input type="radio" name="post-order-by" id="prix_asc" class="form-check-input" value="prix_asc" required onchange="this.form.submit();" <?php if (($this->input->post('post-order-by')) == "prix_asc") {echo "checked";} ?>>
				<span>prix croissant</span>
			</label>
			<label class="form-check form-check-inline">
				<input type="radio" name="post-order-by" id="prix_desc" class="form-check-input" value="prix_desc" required onchange="this.form.submit();" <?php if (($this->input->post('post-order-by')) == "prix_desc") {echo "checked";} ?>>
				<span>prix décroissant</span>
			</label>
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
