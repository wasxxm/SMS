<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->bigInteger('admin_id', true);
			$table->string('admin_fullname', 240);
			$table->string('admin_password', 240);
			$table->string('admin_email', 240);
			$table->dateTime('admin_register_date');
			$table->dateTime('admin_last_login_date');
			$table->string('admin_last_login_ip', 100);
			$table->unique(['admin_fullname','admin_email'], 'admin_fullname');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin');
	}

}
