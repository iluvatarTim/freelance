<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbilityTable extends Migration {

	public function up()
	{
		Schema::create('ability', function(Blueprint $table) {
			$table->increments('id');
			$table->text('descriptiton');
			$table->string('categorie', 20);
			$table->timestamps();
			$table->integer('id_freelancer')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('ability');
	}
}