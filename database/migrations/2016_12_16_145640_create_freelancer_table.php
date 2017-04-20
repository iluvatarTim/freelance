<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFreelancerTable extends Migration {

	public function up()
	{
		Schema::create('freelancer', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('freelancer');
	}
}