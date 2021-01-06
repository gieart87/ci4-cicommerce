<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Products</h1>
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
						<h3 class="card-title">Product Images : <?= $product->name ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<?= view('admin/shared/flash_message') ?>
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th>Image</th>
									<th>Added</th>
									<th style="width:15%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($productImages)) : ?>
									<?php foreach ($productImages as $image) : ?>
										<tr>
											<td><img src="<?= $image->small ?>" class="thumbnails"/></td>
											<td><?= $image->created_at ?></td>
											<td>
												<form method="POST" action="<?= site_url('admin/products/images/' . $image->id) ?>" accept-charset="UTF-8" class="delete" style="display:inline-block">
													<input name="_method" type="hidden" value="DELETE">
													<button class="badge bg-danger" style="border:none !important">delete</button>
												</form>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="3">No record found</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
					<div class="card-footer clearfix">
						<div class="row">
							<div class="col-4">
								<a href="<?= site_url('admin/products/'. $product->id .'/upload-image') ?>" class="btn btn-success">New Image</a>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>