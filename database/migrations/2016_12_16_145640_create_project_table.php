<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectTable extends Migration {

	public function up()
	{
		Schema::create('project', function(Blueprint $table) {
			$table->increments('id');
			$table->float('price', 8,2);
			$table->text('description');
			$table->timestamps();
			$table->integer('compagny_id')->unsigned();
			$table->integer('cdc_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('project');
	}
}