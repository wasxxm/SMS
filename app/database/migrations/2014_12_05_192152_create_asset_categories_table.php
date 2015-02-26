<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asset_categories', function(Blueprint $table)
		{
			$table->bigInteger('asset_category_id', true);
			$table->string('asset_category_name', 240);
			$table->text('asset_category_desc', 65535);
			$table->float('asset_category_dep_rate', 10, 0);
			$table->bigInteger('asset_category_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asset_categories');
	}

}
