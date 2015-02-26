<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDepartmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_departments', function(Blueprint $table)
		{
			$table->bigInteger('user_department_id', true);
			$table->bigInteger('user_id');
			$table->bigInteger('department_id');
			$table->bigInteger('user_department_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_departments');
	}

}
