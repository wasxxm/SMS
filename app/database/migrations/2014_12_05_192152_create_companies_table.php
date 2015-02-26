<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->bigInteger('company_id', true);
			$table->string('company_name', 240);
			$table->string('company_reg_no', 240);
			$table->string('company_country', 100);
			$table->string('company_city', 100);
			$table->string('company_state', 100);
			$table->text('company_address', 65535);
			$table->string('company_phone', 100);
			$table->string('company_website', 240);
			$table->text('company_logo_uri', 65535);
			$table->string('company_email', 240);
			$table->string('company_ntn', 240);
			$table->string('company_vat', 240);
			$table->text('company_notes', 65535);
			$table->text('company_contacts', 65535);
			$table->string('company_currency_code', 100);
			$table->integer('company_users_limit');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
