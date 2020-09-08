<?php namespace App\Entities;

use CodeIgniter\Entity;
use App\Models\AttributeOptionModel;

class Attribute extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    protected $attributes = [
        'options' => null,
    ];

    public function getOptions()
    {
        $attributeOptionModel = new AttributeOptionModel;
        $attributeOptions = $attributeOptionModel
            ->where('attribute_id', $this->id)
            ->findAll();

        $this->attributes['options'] = $attributeOptions;

        return $this->attributes['options'];
    }
}