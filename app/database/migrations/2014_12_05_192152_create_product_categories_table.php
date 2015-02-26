<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_categories', function(Blueprint $table)
		{
			$table->bigInteger('product_category_id', true);
			$table->string('product_category_name', 300);
			$table->text('product_category_desc', 65535);
			$table->string('product_category_type', 100)->default('goods');
			$table->bigInteger('product_category_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_categories');
	}

}
