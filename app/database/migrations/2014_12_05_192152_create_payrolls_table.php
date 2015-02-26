<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePayrollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payrolls', function(Blueprint $table)
		{
			$table->bigInteger('payroll_id', true);
			$table->bigInteger('payroll_employee_id');
			$table->dateTime('payroll_date');
			$table->float('payroll_value', 10, 0);
			$table->bigInteger('payroll_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payrolls');
	}

}
