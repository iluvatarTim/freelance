<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTable extends Migration {

	public function up()
	{
		Schema::create('message', function(Blueprint $table) {
			$table->increments('id');
			$table->string('type', 25);
			$table->string('subject', 50);
			$table->text('content');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('message');
	}
}