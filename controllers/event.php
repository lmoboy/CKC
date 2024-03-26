<?php
require "functions.php";
$config = require "config.php";
require "Database.php";


$db = new Database($config);

$query_string = "SELECT * FROM events";
$params = [];

$events = $db->execute($query_string, $params);


$page_title = "Pasākumi";

require "views/events.view.php";