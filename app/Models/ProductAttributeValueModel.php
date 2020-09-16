<?php namespace App\Models;

use CodeIgniter\Model;

class ProductAttributeValueModel extends Model
{
    protected $table      = 'product_attribute_values';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\ProductAttributeValue';

	protected $allowedFields = [
		'parent_product_id',
		'product_id',
		'attribute_id',
		'attribute_option_id',
		'text_value',
		'boolean_value',
		'integer_value',
		'float_value',
		'datetime_value',
		'date_value',
		'json_value',
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];

	protected $validationMessages = [];
	protected $skipValidation     = false;
}
