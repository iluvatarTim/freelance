<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffreTable extends Migration {

	public function up()
	{
		Schema::create('offre', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('message');
			$table->integer('freelancer_id')->unsigned();
			$table->integer('project_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('offre');
	}
}