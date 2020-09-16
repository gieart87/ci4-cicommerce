<?php if ($configurableAttributes): ?>
    <?php foreach ($configurableAttributes as $attribute): ?>
        <div class="form-group">
            <label for="productAttribute<?= $attribute->code?>"><?= $attribute->name ?></label>
            <?= form_dropdown('configurable['. $attribute->code. '][]', array_column($attribute->options,'name', 'id'), null, ['class' => 'form-control', 'multiple' => true, 'id' => 'attribute-'. $attribute->code]) ?>
        </div>
    <?php endforeach;?>
<?php endif; ?>