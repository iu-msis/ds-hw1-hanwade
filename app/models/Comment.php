<?php

class Comment {
  public $id;
  public $comment;
  public $hourly_rate;

  public function __construct($data) {
    $this->id = intval($data['id']);
    $this->comment = $data['comment'];
  }

  public static function fetchAll() {
    // 1. Create db connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Comments'; //--should this be Comment or Comments
    $statement = $db->prepare($sql);

    //3. Run the results
    $success = $statement->execute();

    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theComment = new Comment($row);
      array_push($arr, $theComment);
    }
    return $arr;
  }
}
