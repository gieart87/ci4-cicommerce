<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected $categoryModel;
    protected $perPage  = 10;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();

        $this->data['currentAdminMenu'] = 'catalogue';
        $this->data['currentAdminSubMenu'] = 'category';
    }

    public function index($categoryId = null)
    {
        if ($categoryId) {
            $category = $this->categoryModel->find($categoryId);
            if (!$category) {
                $this->session->setFlashdata('errors', 'Invalid category');
                return redirect()->to('/admin/categories');
            }

            $this->data['category'] = $category;
        }

        $this->getCategories();
        $this->getParentOptions($categoryId);

        return view('admin/categories/index', $this->data);
    }

    private function getCategories()
    {
        $this->data['categories'] = $this->categoryModel->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->categoryModel->pager;
    }

    private function getParentOptions($exceptCategoryId = null)
    {
        $this->data['parentOptions'] = $this->categoryModel->getParentOptions($exceptCategoryId);
    }

    public function store()
    {
        $params = [
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
        ];

        $this->data['selectedParentId'] = $params['parent_id'];

        if ($this->categoryModel->save($params)) {
            $this->session->setFlashdata('success', 'Category has been saved.');
            return redirect()->to('/admin/categories');
        } else {
            $this->getCategories();
            $this->getParentOptions();
            $this->data['errors'] = $this->categoryModel->errors();
            return view('admin/categories/index', $this->data);
        }
    }

    public function update($id)
    {
        $params = [
			'id' => $id,
            'name' => $this->request->getVar('name'),
            'parent_id' => $this->request->getVar('parent_id'),
        ];
        
        $this->data['selectedParentId'] = $params['parent_id'];

		if ($this->categoryModel->save($params)) {
			$this->session->setFlashdata('success', 'Category has been updated!');
			return redirect()->to('/admin/categories');
		} else {
			$this->getCategories();
			$this->data['errors'] = $this->categoryModel->errors();
			return view('admin/categories/index', $this->data);
		}
    }

    public function destroy($id)
    {
        $category = $this->categoryModel->find($id);
		if (!$category) {
			$this->session->setFlashdata('errors', 'Invalid category');
			return redirect()->to('/admin/categories');
		}

		if ($this->categoryModel->delete($category->id)) {
			$this->session->setFlashdata('success', 'The category has been deleted');
			return redirect()->to('/admin/categories');
		} else {
			$this->session->setFlashdata('errors', 'Could not delete the category');
			return redirect()->to('/admin/categories');
		}
    }
}