<?php namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\ProductModel;
use App\Models\ProductInventoryModel;
use App\Models\ProductImageModel;

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
    protected $productImageModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productInventoryModel = new ProductInventoryModel();
        $this->productImageModel = new ProductImageModel();
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

    public function getFeaturedImage()
    {
        $image = $this->productImageModel
            ->where('product_id', $this->id)
            ->orderBy('created_at', 'desc')
            ->first();

        return $image;
    }

    public function getLowestPrice()
    {
        if ($this->type === $this->productModel::SIMPLE) {
            return $this->price;
        }

        $lowestVariant = $this->productModel
            ->where('parent_id', $this->id)
            ->orderBy('price', 'asc')
            ->first();

        if (!$lowestVariant) {
            return 0;
        }

        return $lowestVariant->price;
    }
}