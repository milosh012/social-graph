<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friends', function($table)
		{
			$table->integer('initiator_user_id')
						->foreign('initiator_user_id')->references('id')->on('users');
			$table->integer('friend_user_id')
						->foreign('friend_user_id')->references('id')->on('users');
			$table->primary(array('initiator_user_id', 'friend_user_id'));
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
		Schema::dropIfExists('friends');
	}

}
