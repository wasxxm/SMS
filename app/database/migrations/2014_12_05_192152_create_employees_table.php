<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employees', function(Blueprint $table)
		{
			$table->bigInteger('employee_id', true);
			$table->string('employee_name', 240);
			$table->string('employee_label', 240);
			$table->float('employee_salary', 10, 0);
			$table->string('employee_photo_uri', 1000);
			$table->boolean('employee_status')->default(1);
			$table->string('employeer_reg_no', 240);
			$table->smallInteger('employee_children_no');
			$table->boolean('employee_relationship_status')->default(0);
			$table->text('employee_diseases', 65535);
			$table->dateTime('empployee_account_date');
			$table->integer('employee_salary_interval');
			$table->string('employee_salary_interval_type', 100)->default('month');
			$table->bigInteger('employee_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employees');
	}

}
