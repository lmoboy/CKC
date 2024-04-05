<?php
require "Database.php";

$config = require ("config.php");
$db = new Database($config);

$query = "SELECT * FROM events";
$params = [];

if (isset($_GET["id"]) && $_GET["id"] != "") {
  $query .= " WHERE id=:id";
  $params[":id"] = $_GET["id"];
}

$posts = $db
  ->execute($query, $params)
  ->fetchAll();

$post["id"] = $posts[0]["id"];
$post["time"] = $posts[0]["date_and_time"];
$post["name"] = $posts[0]["NAME"];
$post["location"] = $posts[0]["location"];
$page_title = htmlspecialchars($post["name"]);


require "views/show/events.view.php";

?>