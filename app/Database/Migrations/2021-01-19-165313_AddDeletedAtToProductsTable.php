<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeletedAtToProductsTable extends Migration
{
	public function up()
	{
		$fields = [
			'deleted_at' => ['type' => 'DATETIME']
		];

		$this->forge->addColumn('products', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('products', 'deleted_at');
	}
}
