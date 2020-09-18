<br/>
    <h3>Product Variants</h3>
<hr/>
<?php foreach($product->variants as $variant):?>
    <?php
        // dd($variant->stock);
    ?>
    <?= form_hidden('variants['. $variant->id .'][id]', $variant->id) ?>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="productSKU-<?= $variant->id ?>">SKU</label>
                <?= form_input('variants['. $variant->id .'][sku]', set_value('sku', isset($variant->sku) ? ($variant->sku) : '' ), ['class' => 'form-control', 'id' => 'productSKU-'. $variant->id]) ?>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group">
                <label for="productName-<?= $variant->id ?>">Name</label>
                <?= form_input('variants['. $variant->id .'][name]', set_value('name', isset($variant->name) ? ($variant->name) : '' ), ['class' => 'form-control', 'id' => 'productName-'. $variant->id]) ?>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="productPrice-<?= $variant->id ?>">Price</label>
                <?= form_input('variants['. $variant->id .'][price]', set_value('price', isset($variant->price) ? ($variant->price) : '' ), ['class' => 'form-control', 'id' => 'productPrice-'. $variant->id]) ?>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="productStock-<?= $variant->id ?>">Stock</label>
                <?= form_input('variants['. $variant->id .'][stock]', set_value('stock', isset($variant->stock) ? ($variant->stock) : '' ), ['class' => 'form-control', 'id' => 'productStock-'. $variant->id]) ?>
            </div>
        </div>
    </div>
<?php endforeach;?>