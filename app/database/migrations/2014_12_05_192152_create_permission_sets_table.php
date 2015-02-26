<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePermissionSetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permission_sets', function(Blueprint $table)
		{
			$table->integer('permission_set_id', true);
			$table->text('permission_ids', 65535);
			$table->string('permission_set_name', 240)->unique('permission_set_name');
			$table->text('permission_set_desc', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permission_sets');
	}

}
