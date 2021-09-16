<?= $this->extend('themes/'. $currentTheme .'/layout') ?>

<?= $this->section('content') ?>
<section class="products-grid pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <?php echo $this->include('themes/'. $currentTheme .'/shared/sidebar'); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="products-top">
                                <div class="products-top-inner">
                                    <div class="products-found">
                                        <p><span>25</span> products found of <span>1.342</span></p>
                                    </div>
                                    <div class="products-sort">
                                        <span>Sort By : </span>
                                        <select name="order" onChange='this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);'>
                                            <?php foreach ($ordering as $orderingKey => $orderingName): ?>
                                                <option value="<?= $orderingKey ?>"><?= $orderingName ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if ($products): ?>
                            <?php foreach ($products as $product):?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="single-product">
                                        <?php if (!empty($product->featured_image)): ?>
                                            <div class="product-img">
                                                <a href="<?= site_url('products/'. $product->sku . '/' . $product->slug) ?>">
                                                    <img src="<?= $product->featured_image->medium ?>" class="img-fluid" />
                                                </a>
                                            </div>
                                        <?php endif;?>
                                        <div class="product-content">
                                            <h3><a href="<?= site_url('products/'. $product->sku . '/' . $product->slug) ?>"><?= $product->name ?></a></h3>
                                            <div class="product-price">
                                                <span>IDR <?= number_format($product->lowest_price) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>