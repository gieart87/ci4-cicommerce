<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $brandModel;

    protected $perPage = 10;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->brandModel = new BrandModel();

        $this->data['currentAdminMenu'] = 'catalogue';
        $this->data['currentAdminSubMenu'] = 'product';
        
        $categories = $this->getCategories();
        $brands = $this->getBrands();

        $this->data['categories'] = $categories;
        $this->data['brands'] = $brands;
        $this->data['types'] = $this->productModel::getProductTypesDropdown();
        $this->data['statuses'] = $this->productModel::getStatuses();
    }

    private function getCategories()
    {
        $categories = [];

        foreach ($this->categoryModel->findAll() as $category) {
            $categories[] = $category->toArray();
        }

        return $categories;
    }

    private function getBrands()
    {
        $brands = [
            '' => '-- Set Brand --',
        ];

        foreach ($this->brandModel->findAll() as $brand) {
            $brands[$brand->id] = $brand->name;
        }

        return $brands;
    }

    public function index()
    {
        $this->getProducts();
        return view('admin/products/index', $this->data);
    }

    private function getProducts()
    {
        $this->data['products'] = $this->productModel
            ->join('product_inventories', 'products.id = product_inventories.product_id')
            ->paginate($this->perPage, 'bootstrap');

        $this->data['pager'] = $this->productModel->pager;
    }

    public function create()
    {
        return view('admin/products/create', $this->data);
    }

    public function store()
    {
        $params = [
			'name' => $this->request->getVar('name'),
			'sku' => $this->request->getVar('sku'),
			'type' => $this->request->getVar('type'),
			'categories' => $this->request->getVar('categories'),
			'brand_id' => $this->request->getVar('brand_id'),
			'user_id' => $this->currentUser->id,
			'price' => $this->request->getVar('price'),
			'stock' => $this->request->getVar('stock'),
			'weight' => $this->request->getVar('weight'),
			'length' => $this->request->getVar('length'),
			'width' => $this->request->getVar('width'),
			'height' => $this->request->getVar('height'),
			'short_description' => $this->request->getVar('short_description'),
			'description' => $this->request->getVar('description'),
			'status' => $this->request->getVar('status'),
        ];
        
        $this->db->transStart();
        $this->productModel->save($params);
        $product = $this->productModel->find($this->db->insertID());
        
        if ($product) {
            $productInventoryTable = $this->db->table('product_inventories');
            $productInventoryTable->insert([
                'product_id' => $product->id,
                'qty' => $params['stock'],
            ]);

            $productCategoryTable = $this->db->table('product_categories');
            if (!empty($params['categories'])) {
                foreach ($params['categories'] as $key => $categoryId) {
                    $productCategoryTable->insert([
                        'product_id' => $product->id,
                        'category_id' => $categoryId,
                    ]);
                }
            }
        }
        $this->db->transComplete();

        if ($product) {
            $this->session->setFlashdata('success', 'Product has been saved.');
            return redirect()->to('/admin/products');
        } else {
            $this->data['categoryIds'] = $params['categories'];
            $this->data['errors'] = $this->productModel->errors();
            return view('admin/products/create', $this->data);
        }
    }
}