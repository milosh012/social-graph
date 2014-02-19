<?php

class FriendsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('friendships')->delete();

    $data = json_decode(file_get_contents(dirname(__FILE__) . '/friends.json'), true);
    $insertData = array();

    foreach ($data as $value) {
      $friendConnection = array(
        'user_id' => $value['id'],
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
      );

      foreach ($value['friends'] as $id) {
        $friendConnection['friend_id'] = $id;
        $insertData[] = $friendConnection;
      }
    }

    Friendship::insert($insertData);
  }

}
