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