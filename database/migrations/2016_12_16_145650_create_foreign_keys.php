<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('admin', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('freelancer', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('company', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('cdc', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('company')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('ability', function(Blueprint $table) {
			$table->foreign('id_freelancer')->references('id')->on('freelancer')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('project', function(Blueprint $table) {
			$table->foreign('compagny_id')->references('id')->on('company')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('project', function(Blueprint $table) {
			$table->foreign('cdc_id')->references('id')->on('cdc')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('offre', function(Blueprint $table) {
			$table->foreign('freelancer_id')->references('id')->on('freelancer')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('offre', function(Blueprint $table) {
			$table->foreign('project_id')->references('id')->on('project')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('test', function(Blueprint $table) {
			$table->foreign('ability_id')->references('id')->on('ability')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('test')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->foreign('freelancer_id')->references('id')->on('freelancer')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->foreign('freelancer_id')->references('id')->on('freelancer')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('company')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->foreign('offre_id')->references('id')->on('offre')
						->onDelete('no action')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('admin', function(Blueprint $table) {
			$table->dropForeign('admin_user_id_foreign');
		});
		Schema::table('freelancer', function(Blueprint $table) {
			$table->dropForeign('freelancer_user_id_foreign');
		});
		Schema::table('company', function(Blueprint $table) {
			$table->dropForeign('company_user_id_foreign');
		});
		Schema::table('cdc', function(Blueprint $table) {
			$table->dropForeign('cdc_company_id_foreign');
		});
		Schema::table('ability', function(Blueprint $table) {
			$table->dropForeign('ability_id_freelancer_foreign');
		});
		Schema::table('message', function(Blueprint $table) {
			$table->dropForeign('message_user_id_foreign');
		});
		Schema::table('project', function(Blueprint $table) {
			$table->dropForeign('project_compagny_id_foreign');
		});
		Schema::table('project', function(Blueprint $table) {
			$table->dropForeign('project_cdc_id_foreign');
		});
		Schema::table('offre', function(Blueprint $table) {
			$table->dropForeign('offre_freelancer_id_foreign');
		});
		Schema::table('offre', function(Blueprint $table) {
			$table->dropForeign('offre_project_id_foreign');
		});
		Schema::table('test', function(Blueprint $table) {
			$table->dropForeign('test_ability_id_foreign');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->dropForeign('result_test_id_foreign');
		});
		Schema::table('result', function(Blueprint $table) {
			$table->dropForeign('result_freelancer_id_foreign');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->dropForeign('contrat_freelancer_id_foreign');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->dropForeign('contrat_company_id_foreign');
		});
		Schema::table('contrat', function(Blueprint $table) {
			$table->dropForeign('contrat_offre_id_foreign');
		});
	}
}