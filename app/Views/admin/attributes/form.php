<div class="card">
	<div class="card-header">
		<h3 class="card-title"><?= isset($attribute) ? 'Update' : 'New' ?> attribute</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<?php if (!empty($attribute)): ?>
		<form role="form" method="post" action="<?= site_url('admin/attributes/'. $attribute->id) ?>">
		<input name="_method" type="hidden" value="PUT">
	<?php else: ?>
		<?= form_open('admin/attributes') ?>
	<?php endif; ?>
		<?= form_hidden('id', isset($attribute->id) ? $attribute->id : null ) ?>
		<div class="card-body">
			<?= view('admin/shared/flash_message') ?>
			<div class="form-group">
				<label for="attributeCode">Code</label>
				<?= form_input('code', set_value('code', isset($attribute->code) ? ($attribute->code) : '' ), ['class' => 'form-control', 'id' => 'attributeCode', 'placeholder' => 'Enter attribute code']) ?>
			</div>
			<div class="form-group">
				<label for="attributeName">Name</label>
				<?= form_input('name', set_value('name', isset($attribute->name) ? ($attribute->name) : '' ), ['class' => 'form-control', 'id' => 'attributeName', 'placeholder' => 'Enter attribute name']) ?>
			</div>
			<div class="form-group">
				<label for="attributeType">Type</label>
				<?= form_dropdown('type', $attributeTypes, set_value('type', isset($attribute->type) ? ($attribute->type) : '' ), ['class' => 'form-control', 'id' => 'attributeType']) ?>
			</div>
			<div class="form-group">
				<label for="attributeIsRequired">Is Required?</label>
				<?= form_dropdown('is_required', $isRequiredOptions, set_value('is_required', isset($attribute->is_required) ? ($attribute->is_required) : '' ), ['class' => 'form-control', 'id' => 'attributeIsRequired']) ?>
			</div>
			<div class="form-group">
				<label for="attributeIsUnique">Is Unique?</label>
				<?= form_dropdown('is_unique', $isUniqueOptions, set_value('is_unique', isset($attribute->is_unique) ? ($attribute->is_unique) : '' ), ['class' => 'form-control', 'id' => 'attributeIsUnique']) ?>
			</div>
			<div class="form-group">
				<label for="attributeValidations">Validation</label>
				<?= form_dropdown('validation', $validations, set_value('validation', isset($attribute->validation) ? ($attribute->validation) : '' ), ['class' => 'form-control', 'id' => 'attributeValidation']) ?>
			</div>
			<div class="form-group">
				<label for="attributeIsConfigurable">Use in Configurable Product?</label>
				<?= form_dropdown('is_configurable', $isConfigurableOptions, set_value('is_configurable', isset($attribute->is_configurable) ? ($attribute->is_configurable) : '' ), ['class' => 'form-control', 'id' => 'attributeIsConfigurable']) ?>
			</div>
			<div class="form-group">
				<label for="attributeIsFilterable">Use in Filtering Product?</label>
				<?= form_dropdown('is_filterable', $isFilterableOptions, set_value('is_filterable', isset($attribute->is_filterable) ? ($attribute->is_filterable) : '' ), ['class' => 'form-control', 'id' => 'attributeIsFilterable']) ?>
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			
			<?php if (!empty($attribute)): ?>
				<a href="<?= site_url('admin/attributes') ?>" class="btn btn-default">Cancel</a>
			<?php endif;?>
		</div>
	</form>
</div>
<!-- /.card -->