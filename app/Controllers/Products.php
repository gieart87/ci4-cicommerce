<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\ProductImageModel;

class Products extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $brandModel;
    protected $productImageModel;
    protected $perPage = 3;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->brandModel = new BrandModel();
        $this->productImageModel = new ProductImageModel();   
    }

    public function index()
    {
        $products = $this->productModel
            ->select('products.*')
            ->where('status', $this->productModel::ACTIVE)
            ->where('products.parent_id IS NULL');
        $this->data['products'] = $products->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->productModel->pager;

        return view('themes/' . $this->data['currentTheme'] . '/products/index', $this->data);
    }
}

