<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_contracts', function(Blueprint $table)
		{
			$table->bigInteger('sale_contract_id', true);
			$table->bigInteger('sale_contract_client_id');
			$table->dateTime('sale_contract_date_added');
			$table->dateTime('sale_contract_start_date');
			$table->dateTime('sale_contract_end_date');
			$table->text('sale_contract_desc', 65535);
			$table->boolean('sale_contract_status')->default(0);
			$table->text('sale_contract_inventory_item_ids', 65535);
			$table->bigInteger('sale_contract_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sale_contracts');
	}

}
