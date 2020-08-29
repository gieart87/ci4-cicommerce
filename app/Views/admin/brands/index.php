<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Brands</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a></li>
			  <li class="breadcrumb-item active">Brands</li>
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
			<div class="col-5">
				<?= $this->include('admin/brands/form') ?>
			</div>
		  	<div class="col-7">
				<div class="card">
			  		<div class="card-header">
					<h3 class="card-title">List of Brands</h3>
					<div class="card-tools">
						<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
							<div class="input-group-append">
								<button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
			  </div>
			  <!-- /.card-header -->
			  	<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th style="width:15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($brands as $brand): ?>
							<tr>
								<td><?= $brand->id ?></td>
								<td><?= $brand->name ?></td>
								<td>
									<a href="<?= site_url('admin/brands/'. $brand->id) ?>" class="badge bg-info">edit</a>
									<form method="POST" action="<?= site_url('admin/brands/'. $brand->id) ?>" accept-charset="UTF-8" class="delete" style="display:inline-block">
										<input name="_method" type="hidden" value="DELETE">
										<button class="badge bg-danger" style="border:none !important">delete</button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
			  	</div>
				<!-- /.card-body -->
				<div class="card-footer clearfix">
					<?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?> 
				</div>
			</div>
			<!-- /.card -->
		  	</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>