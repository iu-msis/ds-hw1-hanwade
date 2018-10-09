<?php

require '../../app/common.php';

$makeId = intval($_GET['makeId'] ?? 0);

if($make < 1) {
  throw new Exception('Invalid Make ID')
}

// 1. Go to the db and get all work associated with the $taskId
$collection = Collection::getAllCollectionByMake($makeId);

// 2. Convert to JSON and Print
header('Content-type: application/json')
echo json_encode($collection);
