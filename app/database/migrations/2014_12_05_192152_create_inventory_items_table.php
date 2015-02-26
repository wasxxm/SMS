<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoryItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventory_items', function(Blueprint $table)
		{
			$table->bigInteger('inventory_item_id', true);
			$table->dateTime('inventory_item_date_added');
			$table->float('inventory_item_value', 10, 0);
			$table->string('inventory_item_source', 100)->default('po');
			$table->bigInteger('inventory_item_po');
			$table->integer('inventory_item_product_id');
			$table->bigInteger('inventory_item_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inventory_items');
	}

}
