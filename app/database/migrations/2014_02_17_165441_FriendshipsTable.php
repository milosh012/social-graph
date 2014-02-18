<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FriendshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friendships', function($table)
		{
			$table->integer('first_user_id')
						->foreign('first_user_id')->references('id')->on('users');
			$table->integer('second_user_id')
						->foreign('second_user_id')->references('id')->on('users');
			$table->primary(array('first_user_id', 'second_user_id'));
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('friendships');
	}

}
