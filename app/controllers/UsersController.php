<?php

use Repositories\UserRepositoryInterface;

class UsersController extends \BaseController {

  /**
   * Users repository
   *
   * @var UserRepositoryInterface
   */
  protected $usersRepository;

  public function __construct(UserRepositoryInterface $usersRepository)
  {
    $this->usersRepository = $usersRepository;
  }

	/**
	 * Return all users
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->usersRepository->getAllUsers();
	}

}
