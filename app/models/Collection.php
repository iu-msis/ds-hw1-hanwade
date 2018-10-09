<?php

class Collection{
  public $make_id;
  public $model_id;

  public function __construct($row) {
    $this->id = $row['id'];

  }

  public static function getAllCollectionByMake($makeId) {
    // 1. Create db connection
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    var_dump($db);

    die;

    // 2. Build the query

    // 3. Run the query

    // 4. Handle the results


  }
}
