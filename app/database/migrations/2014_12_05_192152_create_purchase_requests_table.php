<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_requests', function(Blueprint $table)
		{
			$table->bigInteger('purchase_request_id', true);
			$table->text('purchase_product_ids');
			$table->dateTime('purchase_request_date');
			$table->boolean('purchase_request_status')->default(0);
			$table->text('purchase_request_reject_notes', 65535);
			$table->dateTime('purchase_request_edited_date');
			$table->bigInteger('purchase_request_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_requests');
	}

}
