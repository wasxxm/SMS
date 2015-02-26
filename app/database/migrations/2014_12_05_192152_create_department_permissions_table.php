<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('department_permissions', function(Blueprint $table)
		{
			$table->bigInteger('department_permission_id', true);
			$table->bigInteger('department_id');
			$table->bigInteger('permission_set_id');
			$table->bigInteger('department_permission_company_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('department_permissions');
	}

}
