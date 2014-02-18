<?php

namespace Repositories;

use User;
use Friendship;
use DB;

class EloquentFriendRepository implements FriendRepositoryInterface {

  /**
   * Get friends for specific user
   *
   * @param  integer $userId
   *
   * @return EloquentCollection
   */
  public function getUserFriends($userId)
  {
    return User::findOrFail($userId)->friends()->orderBy('users.id')->get();
  }

  /**
   * Get specific user friends of friends
   *
   * @param  integer $userId
   *
   * @return array
   */
  public function getUserFriendsOfFriends($userId)
  {
    return $this->getUserFriendsOfFriendsQuery($userId)->get();
  }

  /**
   * Get specific user suggested friends
   *
   * @param  integer  $userId
   * @param  integer $directedFriendsCount
   *
   * @return array
   */
  public function getUserSuggestedFriends($userId, $directedFriendsCount = 2)
  {
    return $this->getUserFriendsOfFriendsQuery($userId)
                ->groupBy('friendships.second_user_id')
                ->having(DB::raw('COUNT(*)'), '>=', $directedFriendsCount)
                ->get();
  }

  /**
   * Return query for user friends of friends
   *
   * @param  integer $userId
   *
   * @return array
   */
  private function getUserFriendsOfFriendsQuery($userId)
  {
    // get user friend Ids
    $friendIds = $this->getUserFriendsIds($userId);
    $friendIds[] = $userId;

    // get user friend of friends (that are not user friends)
    return User::join('friendships', 'friendships.second_user_id', '=', 'users.id')
              ->whereIn('first_user_id', $friendIds)
              ->whereNotIn('second_user_id', $friendIds)
              ->orderBy('users.id');
  }

  /**
   * Return friends ids for specific user
   *
   * @param  integer $userId
   *
   * @return array
   */
  private function getUserFriendsIds($userId)
  {
    return Friendship::where('first_user_id', $userId)->lists('second_user_id');
  }

}
