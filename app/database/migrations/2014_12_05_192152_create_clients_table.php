<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->bigInteger('client_id', true);
			$table->string('client_name', 240);
			$table->string('client_phone', 240);
			$table->string('client_email', 240);
			$table->float('client_money_spent', 10, 0);
			$table->dateTime('client_register_date');
			$table->text('client_observations', 65535);
			$table->boolean('client_newsletter_subs')->default(0);
			$table->bigInteger('client_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
