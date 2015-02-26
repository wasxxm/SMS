<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIncomeTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('income_types', function(Blueprint $table)
		{
			$table->bigInteger('income_type_id', true);
			$table->string('income_type_name', 300);
			$table->text('income_type_desc', 65535);
			$table->bigInteger('income_type_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('income_types');
	}

}
