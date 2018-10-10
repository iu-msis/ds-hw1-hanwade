<?php

class Comment {
  public $comment_id;
  public $comment;

  public function __construct($data) {
    $this->comment_id = intval($data['comment_id']);
    $this->comment = $data['comment'];
  }

  public function create() {
    // 1. Create new db connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    // 2. Prepare the query
    $sql = 'INSERT into Comment (comment_id, comment)
            VALUES              (?         , ?      )';
    $statement = $db->prepare($sql);
    // 3. Run the query
    $success = $statement->execute([
      $this->comment_id,
      $this->comment
    ]);

    $this->comment_id = $db->lastInsertId();
  }

  public static function fetchAll() {
    // 1. Create db connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Comment';

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
