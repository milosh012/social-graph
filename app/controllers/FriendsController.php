<?php

use Repositories\FriendRepositoryInterface;

class FriendsController extends \BaseController {

	/**
	 * Friends repository
	 *
	 * @var FriendRepositoryInterface
	 */
	protected $friendsRepository;

	public function __construct(FriendRepositoryInterface $friendsRepository)
	{
		$this->friendsRepository = $friendsRepository;
	}

	/**
	 * Return those people who are directly connected to the chosen person.
	 *
	 * @return Response
	 */
	public function getUserFriends($id)
	{
		return $this->friendsRepository->getUserFriends($id);
	}

	/**
	 * Return those who are two steps away, but not directly connected to the chosen person.
	 *
	 * @param  integer $id
	 *
	 * @return Response
	 */
	public function getUserFriendsOfFriends($id)
	{
		return $this->friendsRepository->getUserFriendsOfFriends($id);
	}

	/**
	 * Return people in the group who know 2 or more direct friends of the chosen person,
	 *
	 * @param  integer $id
	 *
	 * @return Response
	 */
	public function getUserSuggestedFriends($id)
	{
		return $this->friendsRepository->getUserSuggestedFriends($id);
	}


}
