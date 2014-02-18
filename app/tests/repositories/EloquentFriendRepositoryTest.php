<?php

use Repositories\EloquentFriendRepository;

class EloquentFriendRepositoryTest extends TestCase {

	public function testGetUserFriends()
	{
		$repo = new EloquentFriendRepository();

		$this->assertEquals(1, count($repo->getUserFriends(1)));
		$this->assertEquals(2, count($repo->getUserFriends(2)));
		$this->assertEquals(4, count($repo->getUserFriends(3)));
		$this->assertEquals(1, count($repo->getUserFriends(4)));
		$this->assertEquals(5, count($repo->getUserFriends(5)));
		$this->assertEquals(1, count($repo->getUserFriends(6)));
		$this->assertEquals(5, count($repo->getUserFriends(7)));
		$this->assertEquals(1, count($repo->getUserFriends(8)));
		$this->assertEquals(1, count($repo->getUserFriends(9)));
	}

	public function testGetUserFriendsOfFriends()
	{
		$repo = new EloquentFriendRepository();

		$this->assertEquals(1, count($repo->getUserFriendsOfFriends(1)));
		$this->assertEquals(3, count($repo->getUserFriendsOfFriends(2)));
		$this->assertEquals(7, count($repo->getUserFriendsOfFriends(3)));
		$this->assertEquals(3, count($repo->getUserFriendsOfFriends(4)));
	}

	public function testGetUserSuggestedFriends()
	{
		$repo = new EloquentFriendRepository();

		$this->assertEquals(1, count($repo->getUserSuggestedFriends(16)));
		$this->assertEquals(0, count($repo->getUserSuggestedFriends(1)));

	}

}
