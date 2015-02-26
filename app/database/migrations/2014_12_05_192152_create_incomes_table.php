<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incomes', function(Blueprint $table)
		{
			$table->bigInteger('income_id', true);
			$table->dateTime('income_date');
			$table->float('income_value', 10, 0);
			$table->string('income_type_id', 100);
			$table->bigInteger('income_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('incomes');
	}

}
