<?php

namespace Repositories;

use User;

class EloquentUserRepository implements UserRepositoryInterface {

  public function getAllUsers()
  {
    return User::all();
  }

}
