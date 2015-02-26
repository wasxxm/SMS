<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banks', function(Blueprint $table)
		{
			$table->bigInteger('bank_id', true);
			$table->string('bank_account_name', 240);
			$table->boolean('bank_account_status');
			$table->string('bank_account_currency_code', 100);
			$table->string('bank_name', 240);
			$table->string('bank_account_no', 100);
			$table->text('bank_account_notes');
			$table->float('bank_balance', 10, 0);
			$table->bigInteger('bank_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banks');
	}

}
