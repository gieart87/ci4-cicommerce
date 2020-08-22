<div class="card">
	<div class="card-header">
		<h3 class="card-title"><?= isset($attributeOption) ? 'Update' : 'New' ?> attribute</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<?php if (!empty($attributeOption)): ?>
		<form role="form" method="post" action="<?= site_url('admin/attribute-options/'. $attributeOption->id. '/' . $attribute->id) ?>">
		<input name="_method" type="hidden" value="PUT">
	<?php else: ?>
		<?= form_open('admin/attribute-options') ?>
	<?php endif; ?>
		<?= form_hidden('id', isset($attributeOption->id) ? $attributeOption->id : null ) ?>
		<?= form_hidden('attribute_id', isset($attribute->id) ? $attribute->id : null ) ?>
		<div class="card-body">
			<?= view('admin/shared/flash_message') ?>
			<div class="form-group">
				<label for="attributeName">Name</label>
				<?= form_input('name', set_value('name', isset($attributeOption->name) ? ($attributeOption->name) : '' ), ['class' => 'form-control', 'id' => 'attributeName', 'placeholder' => 'Enter attribute name']) ?>
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			
			<?php if (!empty($attributeOption)): ?>
				<a href="<?= site_url('admin/attribute-options/'. $attribute->id) ?>" class="btn btn-default">Cancel</a>
			<?php endif;?>
		</div>
	</form>
</div>
<!-- /.card -->
