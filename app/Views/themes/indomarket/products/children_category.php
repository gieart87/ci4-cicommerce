<?php if (!empty($options['children'])): ?>
    <ul>
        <?php foreach ($options['children'] as $child): ?>
            <li>
                <a href="<?= site_url('products?category='. $child['slug']) ?>"><?= $child['name'] ?></a>
                <?php if (!empty($child['children'])): ?>
                    <?= $this->include('themes/'. $currentTheme .'/products/children_category', ['children' => $child['children']]); ?>
                <?php endif; ?>
            </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>