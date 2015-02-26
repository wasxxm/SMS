<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->bigInteger('supplier_id', true);
			$table->string('supplier_name', 240);
			$table->string('supplier_phone', 100);
			$table->string('supplier_email', 240);
			$table->float('supplier_money_spent', 10, 0);
			$table->dateTime('supplier_register_date');
			$table->integer('supplier_observations');
			$table->integer('supplier_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
