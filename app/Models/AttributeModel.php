<?php namespace App\Models;

use CodeIgniter\Model;

class AttributeModel extends Model
{
    protected $table      = 'attributes';
	protected $primaryKey = 'id';

	protected $returnType     = 'App\Entities\Attribute';

	protected $allowedFields = ['code', 'name', 'type', 'validation', 'is_required', 'is_unique', 'is_filterable', 'is_configurable'];

	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';

	protected $validationRules    = [
		'code' => 'required|min_length[3]',
		'name' => 'required',
		'type' => 'required',
	];

	protected $validationMessages = [];
    protected $skipValidation     = false;
    
    public const ATTRIBUTE_TYPES = [
		''         => '-- Please Choose --',
		'select'   => 'Select',
		'text'     => 'Text',
		'textarea' => 'Textarea',
		'price'    => 'Price',
		'boolean'  => 'Boolean',
		'datetime' => 'Datetime',
		'date'     => 'Date',
	];

	public const IS_REQUIRED_OPTIONS = [
		'' => '-- Please Choose --',
		0  => 'No',
		1  => 'Yes',
	];

	public const IS_UNIQUE_OPTIONS = [
		'' => '-- Please Choose --',
		0  => 'No',
		1  => 'Yes',
	];

	public const VALIDATIONS = [
		''        => '-- Please Choose --',
		'number'  => 'Number',
		'decimal' => 'Decimal',
		'email'   => 'Email',
		'url'     => 'URL',
	];

	public const IS_CONFIGURABLE_OPTIONS = [
		'' => '-- Please Choose --',
		0  => 'No',
		1  => 'Yes',
	];

	public const IS_FILTERABLE_OPTIONS = [
		'' => '-- Please Choose --',
		0  => 'No',
		1  => 'Yes',
	];
}