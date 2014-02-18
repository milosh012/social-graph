<?php


class UsersController extends \BaseController {

	/**
	 * Return all users
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::all();
	}

}
