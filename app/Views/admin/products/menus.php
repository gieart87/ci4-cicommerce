<nav class="nav flex-column nav-pills">
    <a class="nav-link <?= ($productMenu == 'product_details') ? 'active' : '' ?>" href="<?= site_url('admin/products/'. $product->id .'/edit') ?>">Product Details</a>
    <a class="nav-link <?= ($productMenu == 'product_images') ? 'active' : '' ?>" href="<?= site_url('admin/products/'. $product->id .'/images') ?>">Product Images</a>
</nav>