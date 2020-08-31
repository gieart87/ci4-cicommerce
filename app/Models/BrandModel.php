<?php namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'brands';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Brand';

	protected $allowedFields = ['name', 'slug'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [
		'name'	=> 'required|min_length[3]',
	];

	protected $validationMessages = [];
	protected $skipValidation     = false;

	protected $beforeInsert = ['generateSlug'];

	protected function generateSlug(array $data)
	{
		$slug = strtolower(url_title($data['data']['name']));
		$name = trim($data['data']['name']);

		$category = $this->where('name', $name)->orderBy('id', 'DESC')->first();
		if ($category) {
			$slugs = explode('-', $category->slug);
			$slugNumber = !(empty($slugs[1])) ? ((int)$slugs[1] + 1) : 1;
			$slug = $slug. '-' .$slugNumber;
		}

		$data['data']['slug'] = $slug;

		return $data;
	}
}
