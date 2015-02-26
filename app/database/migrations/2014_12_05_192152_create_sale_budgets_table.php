<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleBudgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_budgets', function(Blueprint $table)
		{
			$table->bigInteger('sale_budget_id', true);
			$table->float('sale_budget_value', 10, 0);
			$table->dateTime('sale_budget_added_date');
			$table->dateTime('sale_budget_start_date');
			$table->dateTime('sale_budget_end_date');
			$table->bigInteger('sale_budget_client_id');
			$table->text('sale_budget_inventory_item_ids', 65535);
			$table->bigInteger('sale_budget_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sale_budgets');
	}

}
