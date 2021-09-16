<div class="sidebar">
    <div class="sidebar-widget">
        <div class="widget-title">
            <h3>Shop by Price</h3>
        </div>
        <div class="widget-content shop-by-price">
            <form method="GET" action="<?= site_url('products') ?>">
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
    <?php if (!empty($categories)): ?>
        <div class="sidebar-widget">
            <div class="widget-title">
                <h3>Categories</h3>
            </div>
            <div class="widget-content widget-categories">
                <ul>
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <a href="<?= site_url('products?category='. $category['slug']) ?>"><?= $category['name'] ?></a>
                            <?php if (!empty($category['children'])): ?>
                                <?= $this->include('themes/'. $currentTheme .'/products/children_category', ['children' => $category['children']]); ?>
                            <?php endif; ?>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    <?php endif;?>

    <?php if (!empty($brands)): ?>
        <div class="sidebar-widget">
            <div class="widget-title">
                <h3>Brands</h3>
            </div>
            <div class="widget-content widget-brands">
                <ul>
                    <?php foreach ($brands as $brand): ?>
                        <li><a href="<?= site_url('products?brand='. $brand->slug) ?>"><?= $brand->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif;?>
</div>