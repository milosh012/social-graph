<?php

class User extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

  protected $fillable = array('first_name', 'surname', 'age', 'gender');

  /**
   * Enum for gender field
   *
   * @var array
   */
	public static $gender = array('male', 'female');

  public function friends()
  {
    return $this->belongsToMany('User', 'friendships', 'user_id', 'friend_id');
  }


}
