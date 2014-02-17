<?php

use Repositories\EloquentFriendRepository;

class EloquentFriendRepositoryTest extends TestCase {

	public function testGetUserFriends()
	{
		$repo = new EloquentFriendRepository();

		$this->assertEquals(1, $repo->getUserFriends(1)->count());
		$this->assertEquals(2, $repo->getUserFriends(2)->count());
		$this->assertEquals(4, $repo->getUserFriends(3)->count());
		$this->assertEquals(1, $repo->getUserFriends(4)->count());
		$this->assertEquals(5, $repo->getUserFriends(5)->count());
		$this->assertEquals(1, $repo->getUserFriends(6)->count());
		$this->assertEquals(5, $repo->getUserFriends(7)->count());
		$this->assertEquals(1, $repo->getUserFriends(8)->count());
		$this->assertEquals(1, $repo->getUserFriends(9)->count());
	}

}
