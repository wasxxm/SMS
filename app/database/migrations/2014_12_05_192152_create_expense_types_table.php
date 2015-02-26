<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expense_types', function(Blueprint $table)
		{
			$table->bigInteger('expense_type_id', true);
			$table->string('expense_type_name', 300);
			$table->text('expense_type_desc', 65535);
			$table->bigInteger('expense_type_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expense_types');
	}

}
