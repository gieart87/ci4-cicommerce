<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Category';

	protected $allowedFields = ['name', 'slug', 'parent_id'];

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

	public function getParentOptions($exceptCategoryId = null)
	{
		$categories = [];

		$categoryModel = $this;
		if ($exceptCategoryId) {
			$categoryModel->where('id !=', $exceptCategoryId);
		}

        if ($results = $categoryModel->findAll()) {
            foreach ($results as $result) {
                $categories[] = [
                    'id' => $result->id,
                    'name' => $result->name,
                    'slug' => $result->slug,
                    'parent_id' => $result->parent_id,
                    'created_at' => $result->created_at,
                    'updated_at' => $result->updated_at,
                ];
            }
		}

		return $categories;
	}
}