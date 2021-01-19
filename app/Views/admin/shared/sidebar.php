<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link navbar-primary">
	  	<img src="<?php echo base_url()?>/admin/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			style="opacity: .8">
	  	<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
	  	<!-- Sidebar user panel (optional) -->
	  	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
		  		<img src="<?php echo base_url()?>/admin/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
		  		<a href="#" class="d-block">Alexander Pierce</a>
			</div>
	  	</div>

	  	<!-- Sidebar Menu -->
	  	<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= site_url('admin/dashboard') ?>" class="nav-link <?= ($currentAdminSubMenu == 'dashboard') ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?= ($currentAdminMenu == 'catalogue') ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>Catalogue <i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= site_url('admin/products') ?>" class="nav-link <?= ($currentAdminSubMenu == 'product') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Products</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/products/trashed') ?>" class="nav-link <?= ($currentAdminSubMenu == 'deleted-product') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Deleted Products</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/categories') ?>" class="nav-link <?= ($currentAdminSubMenu == 'category') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Categories</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/attributes') ?>" class="nav-link <?= ($currentAdminSubMenu == 'attribute') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Attributes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/brands') ?>" class="nav-link <?= ($currentAdminSubMenu == 'brand') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Brands</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?= ($currentAdminMenu == 'order') ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>Orders <i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= site_url('admin/orders') ?>" class="nav-link  <?= ($currentAdminSubMenu == 'order') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Orders</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/orders/trashed') ?>" class="nav-link <?= ($currentAdminSubMenu == 'trashed-order') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Trashed</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/shipments') ?>" class="nav-link <?= ($currentAdminSubMenu == 'shipment') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Shipments</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview <?= ($currentAdminMenu == 'report') ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-signal"></i>
						<p>Reports<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= site_url('admin/reports/revenues') ?>" class="nav-link <?= ($currentAdminSubMenu == 'report-revenue') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Revenues</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/reports/products') ?>" class="nav-link <?= ($currentAdminSubMenu == 'report-product') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Products</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/reports/inventories') ?>" class="nav-link <?= ($currentAdminSubMenu == 'report-inventory') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Inventories</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/reports/payments') ?>" class="nav-link <?= ($currentAdminSubMenu == 'report-payment') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Payments</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview  <?= ($currentAdminMenu == 'user-role') ? 'menu-open' : '' ?>">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>User & Roles<i class="fas fa-angle-left right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= site_url('admin/users') ?>" class="nav-link <?= ($currentAdminSubMenu == 'user') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Users</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url('admin/roles') ?>" class="nav-link <?= ($currentAdminSubMenu == 'role') ? 'active' : '' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Roles</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>