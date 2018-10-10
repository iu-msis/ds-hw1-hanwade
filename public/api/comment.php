<?php
require '../../app/common.php';

// 1. Go to database and get all work associated with taskId
$comments = Comment::fetchAll();

// 2. convert to Json
$json = json_encode($comments, JSON_PRETTY_PRINT);

// 3. Print
header('Content-type: application/json');
echo $json;
