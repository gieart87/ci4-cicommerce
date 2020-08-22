<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttrributeOptionsTable extends Migration
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
			'attribute_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
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
		$this->forge->addForeignKey('attribute_id','attributes','id','CASCADE','CASCADE');
		$this->forge->createTable('attribute_options');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('attribute_options');
	}
}
