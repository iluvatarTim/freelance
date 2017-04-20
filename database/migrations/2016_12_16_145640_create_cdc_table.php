<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCdcTable extends Migration {

	public function up()
	{
		Schema::create('cdc', function(Blueprint $table) {
			$table->float('tarif', 8,2);
			$table->date('deadline');
			$table->integer('company_id')->unsigned();
			$table->timestamps();
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('cdc');
	}
}