<?php
require "functions.php";
$config = require "config.php";
require "Database.php";


$db = new Database($config);

$query_string = "SELECT name, description FROM collective";
$params = [];

$collectives = $db->execute($query_string, $params);


$page_title = "collective";

require "views/collective.view.php";