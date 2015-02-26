<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigInteger('product_id', true);
			$table->string('product_name', 500);
			$table->text('product_desc', 65535);
			$table->bigInteger('product_category_id');
			$table->float('product_value', 10, 0);
			$table->bigInteger('product_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
