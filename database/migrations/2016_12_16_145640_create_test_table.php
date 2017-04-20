<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestTable extends Migration {

	public function up()
	{
		Schema::create('test', function(Blueprint $table) {
			$table->increments('id');
			$table->text('description');
			$table->string('url', 255);
			$table->timestamps();
			$table->integer('ability_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('test');
	}
}