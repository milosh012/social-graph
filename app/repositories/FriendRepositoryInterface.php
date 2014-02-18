<?php

namespace Repositories;

interface FriendRepositoryInterface {

  public function getUserFriends($userId);

  public function getUserFriendsOfFriends($userId);

  public function getUserSuggestedFriends($userId, $directedFriendsCount);

}
