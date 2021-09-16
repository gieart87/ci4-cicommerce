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

        $this->data['ordering'] = [
			site_url('products') => 'Default',
			site_url('products?order=price-asc') => 'Price - Low to High',
			site_url('products?order=price-desc') => 'Price - High to Low',
			site_url('products?order=created_at-desc') => 'Newest to Oldest',
			site_url('products?order=created_at-asc') => 'Oldest to Newest',
		];

		$this->data['selectedOrder'] = site_url('products');
    }

    public function index()
    {
        $products = $this->productModel
            ->select("products.*, categories.name as categoryName, categories.slug as categorySlug, brands.name as brandName, brands.slug as brandSlug, (SELECT MIN(price) FROM products AS variants WHERE (products.id = variants.id AND variants.type = 'simple') OR products.id = variants.parent_id LIMIT 1) price")
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

        if ($priceRange = $this->request->getGet('price')) {
            $prices = explode('-', $priceRange);
            $lowPrice = removeAllCharsExceptNumbers($prices[0]);
            $highPrice = removeAllCharsExceptNumbers($prices[1]);

            if ($lowPrice && $highPrice && ($lowPrice < $highPrice)) {
                $products = $products->where("products.price >= $lowPrice AND products.price <= $highPrice OR exists(SELECT * FROM products AS variants WHERE products.id = variants.parent_id AND price >= $lowPrice AND price <= $highPrice)");
            }
        }

        $orderField = 'created_at';
        $orderType = 'desc';
        if ($order = $this->request->getGet('order')) {
            list($orderField, $orderType) = explode('-', $order);
        }
        $products = $products->orderBy($orderField, $orderType);

        $this->data['products'] = $products->paginate($this->perPage, 'bootstrap');
        $this->data['pager'] = $this->productModel->pager;

        return view('themes/' . $this->data['currentTheme'] . '/products/index', $this->data);
    }
}

