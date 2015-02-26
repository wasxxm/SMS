<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxes', function(Blueprint $table)
		{
			$table->bigInteger('tax_id', true);
			$table->string('tax_name', 240);
			$table->string('tax_type', 100)->default('sales_tax');
			$table->text('tax_desc', 65535);
			$table->float('tax_rate', 10, 0);
			$table->bigInteger('tax_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxes');
	}

}
