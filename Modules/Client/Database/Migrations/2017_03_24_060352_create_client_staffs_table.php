<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientStaffsTable extends Migration {
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up() {
		Schema::create('client_staffs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('mobile');
			$table->string('address');
			$table->enum('status',['active','inactive']);  
			$table->string('job_description');
			$table->string('user_id');
			$table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			$table->timestamps();
		});
	}
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function down() {
		Schema::drop('client_staffs');
	}
}