<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSaleInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_invoices', function(Blueprint $table)
		{
			$table->bigInteger('sale_invoice_id', true);
			$table->string('sale_invoice_label', 100);
			$table->bigInteger('sale_invoice_payment_type_id');
			$table->bigInteger('sale_invoice_client_id');
			$table->float('sale_invoice_value', 10, 0);
			$table->string('sale_invoice_source', 100)->default('direct_sale');
			$table->bigInteger('sale_invoice_sale_id');
			$table->bigInteger('sale_invoice_sale_contract_id');
			$table->boolean('sale_invoice_status')->default(0);
			$table->dateTime('sale_invoice_date');
			$table->dateTime('sale_invoice_payment_date');
			$table->bigInteger('sale_invoice_cash_transaction_id');
			$table->bigInteger('sale_invoice_bank_transaction_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sale_invoices');
	}

}
