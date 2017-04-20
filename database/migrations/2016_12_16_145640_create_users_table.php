<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 25);
			$table->string('firstname', 25);
			$table->string('username', 50);
			$table->string('mail', 50);
			$table->string('password', 50);
			$table->string('address', 100);
			$table->integer('phone');
			$table->string('role', 10);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}