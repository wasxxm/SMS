<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_transactions', function(Blueprint $table)
		{
			$table->bigInteger('bank_transaction_id', true);
			$table->text('bank_transaction_details', 65535);
			$table->dateTime('bank_transaction_date');
			$table->bigInteger('bank_transaction_value');
			$table->string('bank_transaction_source', 100)->default('sale');
			$table->bigInteger('bank_transaction_source_id');
			$table->float('bank_transaction_commulative_balance', 10, 0);
			$table->bigInteger('bank_transaction_target_bank_id');
			$table->bigInteger('bank_transaction_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank_transactions');
	}

}
