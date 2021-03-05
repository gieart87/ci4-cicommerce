<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductImageModel extends Model
{
	protected $table      = 'product_images';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\ProductImage';

	protected $allowedFields = [
		'product_id',
		'original',
		'large',
		'medium',
		'small'
	];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [];

	protected $validationMessages = [];
	protected $skipValidation     = false;

	const IMAGE_SIZES = [
		'large' => [
			'width' => 800,
			'height' => 1024,
		],
		'medium' => [
			'width' => 275,
			'height' => 400,
		],
		'small' => [
			'width' => 80,
			'height' => 80,
		],
	];
}
