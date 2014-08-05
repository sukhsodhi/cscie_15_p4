<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create ('question_types', function($table) {
			//id
			$table->increments('id');
			//timestamps
			$table->timestamps();
			//type name
			$table->string('name',50);

		});
		
		Schema::create ('questions', function($table) {
			//id
			$table->increments('id');
			//keep timestamps
			$table->timestamps();

			//other fields
			$table->string('question_name',255);
			$table->integer('type_id')->nullable()->unsigned();
			

		});

		Schema::table ('questions', function($table) {
			$table->foreign('type_id')->references('id')->on('question_types');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop questions first
		Schema::dropIfExists('questions');
		//drop question types
		Schema::dropIfExists('question_types');
	}

}
