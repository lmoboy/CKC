<?php
require "functions.php";
$config = require "config.php";
require "Database.php";
$db = new Database($config);

$query_string = "SELECT * FROM collective";
$params = [];

$collectives = $db->execute($query_string, $params)->fetchAll();


$page_title = "collective";

require "views/collective.view.php";