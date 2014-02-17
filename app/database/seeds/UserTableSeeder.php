<?php

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();

    User::insert(json_decode(file_get_contents(dirname(__FILE__) . '/users.json'), true));
  }

}
