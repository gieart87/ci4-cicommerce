<?= $this->extend('themes/'. $currentTheme .'/layout') ?>

<?= $this->section('content') ?>
<section class="products-grid pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Shop by Price</h3>
                            </div>
                            <div class="widget-content shop-by-price">
                                <form method="GET" action="/tesas">
                                    <div class="price-filter">
                                        <div class="price-filter-inner">
                                            <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                                <div class="label-input">
                                                    <input type="text" id="amount" name="price"
                                                        placeholder="Add Your Price" />
                                                    <button type="submit">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-content widget-categories">
                                <ul>
                                    <li><a href="#">Fashions</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Home and Kitchen</a></li>
                                    <li><a href="#">Baby and Toys</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Digital Goods</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="widget-title">
                                <h3>Brands</h3>
                            </div>
                            <div class="widget-content widget-brands">
                                <ul>
                                    <li><a href="#">Apple</a></li>
                                    <li><a href="#">Samsung</a></li>
                                    <li><a href="#">Lenovo</a></li>
                                    <li><a href="#">Asus</a></li>
                                    <li><a href="#">Xiaomi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                        <select>
                                            <option>Default</option>
                                            <option>Price</option>
                                            <option>Recent</option>
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