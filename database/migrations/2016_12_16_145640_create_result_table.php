<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultTable extends Migration {

	public function up()
	{
		Schema::create('result', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('grade');
			$table->text('comment');
			$table->timestamps();
			$table->integer('test_id')->unsigned();
			$table->integer('freelancer_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('result');
	}
}