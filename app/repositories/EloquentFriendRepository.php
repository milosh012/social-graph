<?php

namespace Repositories;

use User;
use Friend;

class EloquentFriendRepository implements FriendRepositoryInterface {

  public function getUserFriends($userId)
  {
    return User::findOrFail($userId)->friends()->get();
  }

  public function getUserFriendsOfFriends($userId)
  {

  }

  public function getUserSuggestedFriends($userId)
  {

  }

}
