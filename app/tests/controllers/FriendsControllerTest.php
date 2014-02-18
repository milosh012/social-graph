<?php

use \Mockery;

/**
 * Integration test for friends controller
 *
 * @group integration
 */
class FriendsControllerTest extends TestCase {

	private $responseArray = array(
		array(
			'id' => 1,
			'first_name' => 'Paul',
			'surname' => 'Crowe',
			'age' => 28,
			'gender' => 'male'
		),
		array(
			'id' => 2,
			'first_name' => 'Rob',
			'surname' => 'Fitz',
			'age' => 23,
			'gender' => 'male'
		)
	);

	public function setUp()
	{
		parent::setUp();

		$this->mock('Repositories\FriendRepositoryInterface');
	}

	public function testGetUserFriends()
	{
		$this->mock->shouldReceive('getUserFriends')
							->once()
							->with(3)
							->andReturn($this->responseArray);

		$response = $this->call('GET', 'users/3/friends');

		$this->assertJSONResponse($response, $this->responseArray);
	}

	public function testGetUserFriendsOfFriends()
	{
		$this->mock->shouldReceive('getUserFriendsOfFriends')
							->once()
							->with(2)
							->andReturn($this->responseArray);

		$response = $this->call('GET', 'users/2/friends-of-friends');

		$this->assertJSONResponse($response, $this->responseArray);
	}

	public function testGetUserSuggestedFriends()
	{
		$this->mock->shouldReceive('getUserSuggestedFriends')
							->once()
							->with(1)
							->andReturn($this->responseArray);

		$response = $this->call('GET', 'users/1/suggested-friends');

		$this->assertJSONResponse($response, $this->responseArray);
	}

	public function tearDown()
	{
		Mockery::close();
	}

}
