<?php

class FriendsTableSeeder extends Seeder {

  public function run()
  {
    DB::table('friends')->delete();

    $data = json_decode(file_get_contents(dirname(__FILE__) . '/friends.json'), true);
    $insertData = array();

    foreach ($data as $value) {
      $friendConnection = array(
        'initiator_user_id' => $value['id'],
        'created_at' => new DateTime(),
        'updated_at' => new DateTime()
      );

      foreach ($value['friends'] as $id) {
        $friendConnection['friend_user_id'] = $id;
        $insertData[] = $friendConnection;
      }
    }

    Friend::insert($insertData);
  }

}
