<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_orders', function(Blueprint $table)
		{
			$table->bigInteger('purchase_order_id', true);
			$table->float('purchase_order_price', 10, 0);
			$table->bigInteger('purchase_order_supplier_id');
			$table->text('purchase_order_product_ids', 65535);
			$table->dateTime('purchase_order_date');
			$table->smallInteger('purchase_order_status')->default(0);
			$table->bigInteger('purchase_order_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_orders');
	}

}
