<?php

require '../../app/common.php';

$makeId = intval()$_GET['makeId'] ?? 0);

if($make < 1) {
  throw new Exception('Invalid Make ID';
}

// 1. Go to the db and get all work associated with the $taskId
$makeArr = Collection::getAllCollectionBymake($makeId);

// 2. Convert to JSON
$json = json_encode($makeArr);

// 3. Print
echo $json;
