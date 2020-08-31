<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductCategoriesTable extends Migration
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
			'product_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'category_id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('product_id','products','id');
		$this->forge->addForeignKey('category_id','categories','id');
		$this->forge->createTable('product_categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('product_categories');
	}
}
