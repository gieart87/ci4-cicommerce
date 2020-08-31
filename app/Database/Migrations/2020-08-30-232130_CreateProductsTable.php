<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
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
			'parent_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => true,
			],
			'user_id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => 8,
				'unsigned'       => true,
				'null' => true,
			],
			'brand_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'null' => true,
			],
			'status' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'sku' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'type' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'price' => [
				'type' => 'DECIMAL',
				'constraint' => '15,2',
			],
			'weight' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			],
			'length' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			],
			'width' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			],
			'height' => [
				'type' => 'DECIMAL',
				'constraint' => '10,2',
			],
			'short_description' => [
				'type' => 'TEXT',
			],
			'description' => [
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
		$this->forge->addKey('slug');
		$this->forge->addKey('sku');
		$this->forge->addKey('parent_id');
		$this->forge->addForeignKey('user_id','users','id');
		$this->forge->addForeignKey('brand_id','brands','id');
		$this->forge->createTable('products');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('products');
	}
}
