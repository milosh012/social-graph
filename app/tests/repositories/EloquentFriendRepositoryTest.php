<?php

use Repositories\EloquentFriendRepository;

/**
 * Test for EloquentFriendRepository
 *
 * @group unit
 */
class EloquentFriendRepositoryTest extends TestCase {

	private $repo;

	public function setUp()
	{
		parent::setUp();

		$this->repo = new EloquentFriendRepository();
	}

	public function testGetUserFriends()
	{
		$this->assertEquals(1, $this->repo->getUserFriends(1)->count());
		$this->assertEquals(2, $this->repo->getUserFriends(2)->count());
		$this->assertEquals(4, $this->repo->getUserFriends(3)->count());
		$this->assertEquals(1, $this->repo->getUserFriends(4)->count());
		$this->assertEquals(5, $this->repo->getUserFriends(5)->count());
		$this->assertEquals(1, $this->repo->getUserFriends(6)->count());
		$this->assertEquals(5, $this->repo->getUserFriends(7)->count());
		$this->assertEquals(1, $this->repo->getUserFriends(8)->count());
		$this->assertEquals(1, $this->repo->getUserFriends(9)->count());
	}

	public function testGetUserFriendsOfFriends()
	{
		// valid users
		$this->assertEquals(1, $this->repo->getUserFriendsOfFriends(1)->count());
		$this->assertEquals(3, $this->repo->getUserFriendsOfFriends(2)->count());
		$this->assertEquals(7, $this->repo->getUserFriendsOfFriends(3)->count());
		$this->assertEquals(3, $this->repo->getUserFriendsOfFriends(4)->count());
		$this->assertEquals(4, $this->repo->getUserFriendsOfFriends(6)->count());
		$this->assertEquals(10, $this->repo->getUserFriendsOfFriends(7)->count());

		// check ids
		$this->assertEquals(array(2, 4, 8, 12, 19, 20), $this->repo->getUserFriendsOfFriends(5)->lists('id'));

		// not existing user
		$this->assertEquals(0, $this->repo->getUserFriendsOfFriends(44)->count());
	}

	public function testGetUserSuggestedFriends()
	{
		// valid users
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(1)->count());
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(2)->count());
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(3)->count());
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(4)->count());
		$this->assertEquals(1, $this->repo->getUserSuggestedFriends(5)->count());
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(6)->count());
		$this->assertEquals(2, $this->repo->getUserSuggestedFriends(7)->count());
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(8)->count());

		$this->assertEquals(array(17), $this->repo->getUserSuggestedFriends(16)->lists('id'));

		// not existing user
		$this->assertEquals(0, $this->repo->getUserSuggestedFriends(111)->count());
	}

}
