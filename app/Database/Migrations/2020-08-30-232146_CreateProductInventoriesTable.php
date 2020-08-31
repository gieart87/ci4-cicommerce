<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductInventoriesTable extends Migration
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
			'qty' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_at' => [
				'type' => 'DATETIME',
			],
			'updated_at' => [
				'type' => 'DATETIME',
			],
		]);

		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('product_id','products','id');
		$this->forge->createTable('product_inventories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('product_inventories');
	}
}
