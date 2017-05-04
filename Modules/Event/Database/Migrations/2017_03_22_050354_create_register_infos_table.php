<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterInfosTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('register_infos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
			$table->string('unique_code');
			$table->integer('form_submission_id')->unsigned();
			$table->foreign('form_submission_id')->references('id')->on('form_submissions')->onDelete('cascade');
			$table->enum('isattend',['0','1']);
			$table->integer('user_id');
			$table->enum('status',['active','inactive']);
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('register_infos');
	}
}