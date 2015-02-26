<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('user_id', true);
			$table->bigInteger('user_company_id');
			$table->string('user_email', 240)->unique('user_email');
			$table->string('user_password', 240);
			$table->string('user_fullname', 240);
			$table->string('user_label', 240);
			$table->string('user_phone', 240);
			$table->dateTime('user_register_date');
			$table->dateTime('user_last_login_date');
			$table->string('user_last_login_ip', 100);
			$table->boolean('user_staus')->default(1);
			$table->text('user_block_note', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
