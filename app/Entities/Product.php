<?php namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\ProductModel;
use App\Models\ProductInventoryModel;

class Product extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    protected $attributes = [
        'variants' => null,
        'categories' => null,
        'stock' => null,
    ];

    protected $productModel;
    protected $productInventoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productInventoryModel = new ProductInventoryModel();
    }

    public function getVariants()
    {
        $variants = $this->productModel
            ->where('parent_id', $this->id)
            ->findAll();

       return $variants;
    }

    public function getCategories()
    {
        $categories = $this->productModel
            ->select('categories.*')
            ->join('product_categories', 'products.id = product_categories.product_id')
            ->join('categories', 'categories.id = product_categories.category_id')
            ->where('products.id', $this->id)
            ->distinct()
            ->findAll();
        
        return $categories;
    }

    public function getStock()
    {
        $productInventory = $this->productInventoryModel
            ->where('product_id', $this->id)
            ->first();

        $stock = !empty($productInventory) ? $productInventory->qty : 0;

        return $stock;
    }
}