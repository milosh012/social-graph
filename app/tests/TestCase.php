<?php

use \Mockery;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	protected $mock;

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	 * Mocking class
	 *
	 * @param  string $class
	 *
	 * @return Mock
	 */
	public function mock($class)
	{
		$this->mock = Mockery::mock($class);

		$this->app->instance($class, $this->mock);

		return $this->mock;
	}

	public function assertJSONResponse($response, array $expectedResponseArray)
	{
		$this->assertResponseOk();
		$this->assertEquals('application/json', $response->headers->get('content-type'));
		$this->assertEquals(json_encode($expectedResponseArray), $response->getContent());
	}

}
