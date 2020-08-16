<div class="card">
	<div class="card-header">
		<h3 class="card-title"><?= isset($category) ? 'Update' : 'New' ?> Category</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<?php if (!empty($category)): ?>
		<form role="form" method="post" action="<?= site_url('admin/categories/'. $category->id) ?>">
		<input name="_method" type="hidden" value="PUT">
	<?php else: ?>
		<form role="form" method="post" action="<?= site_url('admin/categories') ?>">
	<?php endif; ?>
		<input type="hidden" name="id" value="<?= isset($category->id) ? $category->id : null ?>"/>
		<div class="card-body">
			<?= view('admin/shared/flash_message') ?>
			<div class="form-group">
				<label for="categoryName">Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo set_value('name', isset($category->name) ? ($category->name) : '' ); ?>" id="categoryName" placeholder="Enter category name">
			</div>
			<div class="form-group">
				<label for="parentCategory">Parent</label>
				<?php
					$selected = !(empty($category->parent_id)) ? $category->parent_id : "";
					
					if (!empty($selectedParentId)) {
						$selected = $selectedParentId;
					}
				?>
				<?= selectMultiLevel('parent_id', $parentOptions, ['class' => 'form-control', 'placeholder' => '-- Choose Category --', 'selected' => $selected]) ?>
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			
			<?php if (!empty($category)): ?>
				<a href="<?= site_url('admin/categories') ?>" class="btn btn-default">Cancel</a>
			<?php endif;?>
		</div>
	</form>
</div>
<!-- /.card -->