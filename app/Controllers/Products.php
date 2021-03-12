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
    protected $perPage = 12;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->brandModel = new BrandModel();
        $this->productImageModel = new ProductImageModel();  
        
        $categories = $this->categoryModel->getNestedCategories();

        $this->data['categories'] = $categories;
        $this->data['brands'] = $this->brandModel->findAll();
    }

    public function index()
    {
        $products = $this->productModel
            ->select('products.*, categories.name as categoryName, categories.slug as categorySlug, brands.name as brandName, brands.slug as brandSlug')
            ->join('product_categories', 'products.id = product_categories.product_id', 'left')
            ->join('categories', 'product_categories.category_id = categories.id', 'left')
            ->join('brands', 'products.brand_id = brands.id', 'left')
            ->where('status', $this->productModel::ACTIVE)
            ->where('products.parent_id IS NULL');
        
        if ($categorySlug = $this->request->getGet('category')) {
            $products = $products->where('categories.slug', $categorySlug);
        }

        if ($brandSlug = $this->request->getGet('brand')) {
            $products = $products->where('brands.slug', $brandSlug);
        }

        $this->data['products'] = $products->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->productModel->pager;

        return view('themes/' . $this->data['currentTheme'] . '/products/index', $this->data);
    }
}

