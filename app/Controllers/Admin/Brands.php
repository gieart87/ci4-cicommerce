<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BrandModel;

class Brands extends BaseController
{
    protected $brandModel;
    protected $perPage  = 10;

    public function __construct()
    {
        $this->brandModel = new BrandModel();

        $this->data['currentAdminMenu'] = 'catalogue';
        $this->data['currentAdminSubMenu'] = 'brand';
    }

    public function index($brandId = null)
    {
        if ($brandId) {
            $brand = $this->brandModel->find($brandId);
            if (!$brand) {
                $this->session->setFlashdata('errors', 'Invalid brand');
                return redirect()->to('/admin/brands');
            }

            $this->data['brand'] = $brand;
        }

        $this->getBrands();

        return view('admin/brands/index', $this->data);
    }

    private function getBrands()
    {
        $this->data['brands'] = $this->brandModel->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->brandModel->pager;
    }

    public function store()
    {
        $params = [
            'name' => $this->request->getVar('name'),
        ];

        if ($this->brandModel->save($params)) {
            $this->session->setFlashdata('success', 'Brand has been saved.');
            return redirect()->to('/admin/brands');
        } else {
            $this->getBrands();
            $this->data['errors'] = $this->brandModel->errors();
            return view('admin/brands/index', $this->data);
        }
    }

    public function update($id)
    {
        $params = [
			'id' => $id,
            'name' => $this->request->getVar('name'),
        ];

		if ($this->brandModel->save($params)) {
			$this->session->setFlashdata('success', 'Brand has been updated!');
			return redirect()->to('/admin/brands');
		} else {
			$this->getBrands();
			$this->data['errors'] = $this->brandModel->errors();
			return view('admin/brands/index', $this->data);
		}
    }

    public function destroy($id)
    {
        $brand = $this->brandModel->find($id);
		if (!$brand) {
			$this->session->setFlashdata('errors', 'Invalid brand');
			return redirect()->to('/admin/brands');
		}

		if ($this->brandModel->delete($brand->id)) {
			$this->session->setFlashdata('success', 'The brand has been deleted');
			return redirect()->to('/admin/brands');
		} else {
			$this->session->setFlashdata('errors', 'Could not delete the brand');
			return redirect()->to('/admin/brands');
		}
    }
}