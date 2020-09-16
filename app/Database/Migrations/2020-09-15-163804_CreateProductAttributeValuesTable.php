<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductAttributeValuesTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'parent_product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => true,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => true,
			],
			'attribute_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'null' => true,
			],
			'attribute_option_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'null' => true,
			],
			'text_value' => [
				'type' => 'TEXT',
			],
			'boolean_value' => [
				'type' => 'TINYINT',
				'constraint' => 1,
			],
			'integer_value' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'float_value' => [
				'type' => 'DECIMAL',
				'constraint' => '15,2',
			],
			'datetime_value' => [
				'type' => 'DATETIME',
			],
			'date_value' => [
				'type' => 'DATE',
			],
			'json_value' => [
				'type' => 'TEXT',
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('attribute_option_id','attribute_options','id');
		$this->forge->addForeignKey('attribute_id','attributes','id');
		$this->forge->addForeignKey('product_id','products','id');
		$this->forge->addForeignKey('parent_product_id','products','id');
		$this->forge->createTable('product_attribute_values');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('product_attribute_values');
	}
}
