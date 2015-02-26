<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table)
		{
			$table->bigInteger('sale_id', true);
			$table->bigInteger('sale_client_id');
			$table->text('sale_inventory_item_ids', 65535);
			$table->float('sale_value', 10, 0);
			$table->dateTime('sale_date');
			$table->boolean('sale_is_contract')->default(0);
			$table->bigInteger('sale_contract_id');
			$table->bigInteger('sale_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}

}
