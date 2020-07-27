<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Category';

	protected $allowedFields = ['name', 'slug'];

	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [
		'name'	=> 'required|is_unique[categories.name,id,{id}]|min_length[3]',
	];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}