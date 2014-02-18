<?php

use \Mockery;

/**
 * Integration test for users controller
 *
 * @group integration
 */
class UsersControllerTest extends TestCase {

	public function setUp()
	{
		parent::setUp();

		$this->mock('Repositories\UserRepositoryInterface');
	}

	public function testIndex()
	{
		$responseArray = array(
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

		$this->mock->shouldReceive('getAllUsers')
							->once()
							->andReturn($responseArray);

		$response = $this->call('GET', 'users');

		$this->assertJSONResponse($response, $responseArray);
	}

	public function tearDown()
	{
		Mockery::close();
	}

}
