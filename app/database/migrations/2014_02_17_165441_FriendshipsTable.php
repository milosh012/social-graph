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
			$table->integer('user_id')
						->foreign('user_id')->references('id')->on('users');
			$table->integer('friend_id')
						->foreign('friend_id')->references('id')->on('users');
			$table->primary(array('user_id', 'friend_id'));
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
