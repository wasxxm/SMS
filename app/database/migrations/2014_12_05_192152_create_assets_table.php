<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->bigInteger('asset_id', true);
			$table->string('asset_name', 240);
			$table->float('asset_value', 10, 0);
			$table->text('asset_desc', 65535);
			$table->string('asset_label', 100);
			$table->bigInteger('asset_category_id');
			$table->dateTime('asset_purchase_date');
			$table->bigInteger('asset_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assets');
	}

}
