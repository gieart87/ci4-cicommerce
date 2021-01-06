<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>New Product</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
			  <li class="breadcrumb-item active">Products</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- /.row -->
		<div class="row">
			<?php if (!empty($product)) : ?>
				<div class="col-3">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Menu</h3>
						</div>
						<div class="card-body">
							<?= $this->include('admin/products/menus'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		  	<div class="col-9">
			  <div class="card">
				<div class="card-header">
					<h3 class="card-title"><?= isset($product) ? 'Update' : 'New' ?> Product</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<?php if (!empty($product)): ?>
					<form role="form" method="post" action="<?= site_url('admin/products/'. $product->id) ?>">
					<input name="_method" type="hidden" value="PUT">
				<?php else: ?>
					<form role="form" method="post" action="<?= site_url('admin/products') ?>">
				<?php endif; ?>
					<input type="hidden" name="id" value="<?= isset($product->id) ? $product->id : null ?>"/>
					<div class="card-body">
						<?= view('admin/shared/flash_message') ?>
						<div class="form-group">
							<label for="productType">Type</label>
							<?php
								$typeInputProperties = ['class' => 'form-control product-type', 'id' => 'productType', 'required' => true];

								if (!empty($product)) {
									$typeInputProperties = array_merge($typeInputProperties, [
										'readonly' => true,
									]);
								}
							?>
							<?= form_dropdown('type', $types, set_value('type', isset($product->type) ? ($product->type) : '' ), $typeInputProperties) ?>
						</div>
						<div class="form-group">
							<label for="productSku">SKU</label>
							<?= form_input('sku', set_value('sku', isset($product->sku) ? ($product->sku) : '' ), ['class' => 'form-control', 'id' => 'productSku', 'placeholder' => 'Enter product sku', 'required' => true]) ?>
						</div>
						<div class="form-group">
							<label for="productName">Name</label>
							<?= form_input('name', set_value('name', isset($product->name) ? ($product->name) : '' ), ['class' => 'form-control', 'id' => 'productName', 'placeholder' => 'Enter product name', 'required' => true]) ?>
						</div>
						<div class="form-group">
							<label for="productCategories">Categories</label>
							<?php
								$selected = !(empty($categoryIds)) ? $categoryIds : [];
							?>
							<?= selectMultiLevel('categories[]', $categories, ['class' => 'form-control', 'selected' => $selected, 'multiple' => true, 'required' => true]) ?>
						</div>
                        <div class="form-group">
                            <label for="productBrand">Brand</label>
                            <?= form_dropdown('brand_id', $brands, set_value('brand_id', isset($product->brand_id) ? ($product->brand_id) : '' ), ['class' => 'form-control', 'id' => 'productBrandId']) ?>
                        </div>
						<div class="simple-attributes">
							<?= $this->include('admin/products/simple_product_fields') ?>
						</div>
						<?php if (empty($product)):?>
							<div class="configurable-attributes">
								<?= $this->include('admin/products/configurable_attributes') ?>
							</div>
						<?php endif; ?>

						<?php if (!empty($product) && $product->type == 'configurable'):?>
							<?= $this->include('admin/products/configurable_fields'); ?>
						<?php endif;?>
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
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						
						<?php if (!empty($product)): ?>
							<a href="<?= site_url('admin/products') ?>" class="btn btn-default">Cancel</a>
						<?php endif;?>
					</div>
				</form>
			</div>
			<!-- /.card -->
			</div>
			<!-- /.card -->
		  	</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>