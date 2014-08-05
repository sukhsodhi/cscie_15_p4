<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table) {

		    $table->increments('id');
		    $table->string('email')->unique();
		    $table->boolean('remember_token');
		    $table->string('first_name');
		    $table->string('last_name');
		    $table->string('password');
		    $table->timestamps();

		});

		Schema::create('user_question_answers', function($table) {

		    $table->increments('id');
		    $table->integer('question_id')->nullable()->unsigned();
		    $table->integer('user_id')->nullable()->unsigned();
		    $table->string('answer');
		    $table->timestamps();

		});

		Schema::table ('user_question_answers', function($table) {
			$table->foreign('question_id')->references('id')->on('questions');
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::dropIfExists('user_question_answers');
		Schema::dropIfExists('users');

	}

}
