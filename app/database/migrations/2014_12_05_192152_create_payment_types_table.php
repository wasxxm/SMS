<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_types', function(Blueprint $table)
		{
			$table->bigInteger('payment_type_id', true);
			$table->string('payment_type_name', 240);
			$table->text('payment_type_desc', 65535);
			$table->bigInteger('payment_type_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_types');
	}

}
