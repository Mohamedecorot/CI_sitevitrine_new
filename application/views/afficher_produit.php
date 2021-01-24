<div class="container">
	<div class="row my-3">
		<div class="col">
			<h1>Listes des produits</h1>
		</div>
		</div>
		<div class="row">
		<?php foreach($mydata as $produit): ?>
			<div class="col-12 col-lg-4">
				<div class="card mb-4 mb-lg-0">
					<img src="#" alt="<?php echo $produit->illustration; ?>" class="card-img-top">
					<div class="card-body">
						<h4 class="card-title"><?php echo htmlentities($produit->nom); ?></h4>
						<h6 class="card-text">Catégorie : <?php echo $produit->categorie; ?></h6>
						<p class="card-text"><?php echo $produit->description; ?></p>
						<p class="card-text">Prix : <?php echo $produit->prix; ?> €</p>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
