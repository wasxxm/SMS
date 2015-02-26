<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_invoices', function(Blueprint $table)
		{
			$table->bigInteger('purchase_invoice_id', true);
			$table->string('purchase_invoice_label', 100);
			$table->bigInteger('purchase_invoice_payment_type_id');
			$table->bigInteger('purchase_invoice_supplier_id');
			$table->float('purchase_invoice_value', 10, 0);
			$table->dateTime('purchase_invoice_date');
			$table->string('purchase_invoice_source', 100);
			$table->bigInteger('purchase_invoice_po_id');
			$table->string('purchase_invoice_status', 100);
			$table->dateTime('purchase_invoice_payment_date');
			$table->bigInteger('purchase_invoice_cash_transaction_id');
			$table->bigInteger('purchase_invoice_transaction_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_invoices');
	}

}
