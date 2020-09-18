<?php namespace App\Models;

use CodeIgniter\Model;

class ProductInventoryModel extends Model
{
    protected $table      = 'product_inventories';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\ProductInventory';

	protected $allowedFields = [
		'product_id',
		'qty'
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];

	protected $validationMessages = [];
	protected $skipValidation     = false;
}
