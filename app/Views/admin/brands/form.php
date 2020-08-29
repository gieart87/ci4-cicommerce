<div class="card">
	<div class="card-header">
		<h3 class="card-title"><?= isset($brand) ? 'Update' : 'New' ?> Brand</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<?php if (!empty($brand)): ?>
		<form role="form" method="post" action="<?= site_url('admin/brands/'. $brand->id) ?>">
		<input name="_method" type="hidden" value="PUT">
	<?php else: ?>
		<form role="form" method="post" action="<?= site_url('admin/brands') ?>">
	<?php endif; ?>
		<input type="hidden" name="id" value="<?= isset($brand->id) ? $brand->id : null ?>"/>
		<div class="card-body">
			<?= view('admin/shared/flash_message') ?>
			<div class="form-group">
				<label for="categoryName">Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo set_value('name', isset($brand->name) ? ($brand->name) : '' ); ?>" id="categoryName" placeholder="Enter category name">
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			
			<?php if (!empty($brand)): ?>
				<a href="<?= site_url('admin/brands') ?>" class="btn btn-default">Cancel</a>
			<?php endif;?>
		</div>
	</form>
</div>
<!-- /.card -->