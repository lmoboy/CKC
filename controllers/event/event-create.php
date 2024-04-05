<?php



require "Validation.php";
require "Database.php";
$config = require ("config.php");
$db = new Database($config);
$va = new Validation();

//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];


  if ($va->validate($_POST["time"], max: 255)) {
    $time = date("Y-m-d H:i:s", strtotime($_POST["time"]));
    $errors["time"] = "Time is invalid";
  }


  if ($va->validate($_POST["title"], max: 255)) {
    $errors["title"] = "Title cannot be empty or too big";
  }

  if ($va->validate($_POST["location"], max: 255)) {
    $errors["location"] = "Location empty or too big";
  }

  if (empty($errors)) {
    $query = "INSERT INTO events (date_and_time, name, location)
              VALUES (:time , :title , :location);";
    $params = [
      ":title" => $_POST["title"],
      ":time" => date("Y-m-d H:i:s", strtotime($_POST["time"])),
      ":location" => $_POST["location"]
    ];
    $db->execute($query, $params);

    header("Location: /");
    die();
  }


}

$page_title = "Create a Post";
require "views/event-create.view.php";

