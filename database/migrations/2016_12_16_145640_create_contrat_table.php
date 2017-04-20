<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratTable extends Migration {

	public function up()
	{
		Schema::create('contrat', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('freelancer_id')->unsigned();
			$table->integer('company_id')->unsigned();
			$table->integer('offre_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('contrat');
	}
}