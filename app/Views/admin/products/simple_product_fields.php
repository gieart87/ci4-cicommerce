<div class="row">
	<div class="col-4">
		<div class="form-group">
			<label for="productPrice">Price</label>
			<?= form_input('price', set_value('price', isset($product->price) ? ($product->price) : '' ), ['class' => 'form-control', 'id' => 'productPrice']) ?>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="productStock">Stock</label>
			<?= form_input('stock', set_value('stock', isset($product->stock) ? ($product->stock) : '' ), ['class' => 'form-control', 'id' => 'productStock']) ?>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="productWeight">Weight (gram)</label>
			<?= form_input('weight', set_value('weight', isset($product->weight) ? ($product->weight) : '' ), ['class' => 'form-control', 'id' => 'productWeight']) ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="form-group">
			<label for="productLength">Length</label>
			<?= form_input('length', set_value('length', isset($product->length) ? ($product->length) : '' ), ['class' => 'form-control', 'id' => 'productLength']) ?>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="productWidth">Width</label>
			<?= form_input('width', set_value('width', isset($product->width) ? ($product->width) : '' ), ['class' => 'form-control', 'id' => 'productWidth']) ?>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			<label for="productHeight">Height</label>
			<?= form_input('height', set_value('height', isset($product->height) ? ($product->height) : '' ), ['class' => 'form-control', 'id' => 'productHeight']) ?>
		</div>
	</div>
</div>
<div class="form-group">
	<label for="productShortDescription">Short Description</label>
	<?= form_textarea('short_description', set_value('short_description', isset($product->short_description) ? ($product->short_description) : '' ), ['class' => 'form-control', 'id' => 'productShortDescription']) ?>
</div>
<div class="form-group">
	<label for="productDescription">Description</label>
	<?= form_textarea('description', set_value('description', isset($product->description) ? ($product->description) : '' ), ['class' => 'form-control', 'id' => 'productDescription']) ?>
</div>
<div class="form-group">
	<label for="productStatus">Status</label>
	<?= form_dropdown('status', $statuses, set_value('status', isset($product->status) ? ($product->status) : '' ), ['class' => 'form-control', 'id' => 'productStatus']) ?>
</div>