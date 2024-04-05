<?php
require "Database.php";

$config = require ("config.php");
$db = new Database($config);

$query = "SELECT * FROM collective";
$params = [];

if (isset($_GET["id"]) && $_GET["id"] != "") {
  $query .= " WHERE id=:id";
  $params[":id"] = $_GET["id"];
}

$posts = $db
  ->execute($query, $params)
  ->fetchAll();

$post["name"] = $posts[0]["NAME"];
$post["description"] = $posts[0]["DESCRIPTION"];
$post["id"] = $posts[0]["id"];
$page_title = $post["name"];


require "views/show/collective.view.php";

?>