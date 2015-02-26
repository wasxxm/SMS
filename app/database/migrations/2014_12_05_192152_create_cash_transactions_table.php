<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cash_transactions', function(Blueprint $table)
		{
			$table->bigInteger('cash_transaction_id', true);
			$table->text('cash_transaction_details', 65535);
			$table->dateTime('cash_transaction_date');
			$table->float('cash_transaction_value', 10, 0);
			$table->float('cash_transaction_commulative_balance', 10, 0);
			$table->string('cash_transaction_source', 100)->default('sale');
			$table->bigInteger('cash_transaction_source_id');
			$table->bigInteger('cash_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cash_transactions');
	}

}
