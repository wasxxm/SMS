<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function(Blueprint $table)
		{
			$table->bigInteger('log_id', true);
			$table->bigInteger('log_company_id');
			$table->text('log_activity_name', 65535);
			$table->text('log_activity_details');
			$table->integer('log_activity_user_id');
			$table->dateTime('log_time');
			$table->string('log_ip', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs');
	}

}
