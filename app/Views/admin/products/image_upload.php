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
						<h3 class="card-title">Upload Product Image</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" method="post" action="<?= site_url('admin/products/'. $product->id .'/upload-image') ?>" enctype="multipart/form-data">
						<div class="card-body">
							<?= view('admin/shared/flash_message') ?>

							<div class="form-group">
								<label for="productImage">Name</label>
								<?= form_upload('image', '' , ['class' => 'form-control', 'id' => 'productImage', 'required' => true]) ?>
							</div>

						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Upload</button>
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