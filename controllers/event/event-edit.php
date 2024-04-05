<?php
require "functions.php";
$config = require "config.php";
require "Validation.php";
require "Database.php";
$va = new Validation();
$db = new Database($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $errors = [];


  if (!isset($_GET["id"])) {

    $errors["id"] = "no id";
  }
  if (!isset($_POST["name"])) {
    $errors["name"] = "no name set";
  }
  if (!isset($_POST["location"])) {
    $errors["location"] = "no location set";
  }
  if (!isset($_POST["time"])) {
    $errors["time"] = "no time set";
  }


  if ($va->validate($_POST["time"], max: 255)) {
    $time = date("Y-m-d H:i:s", strtotime($_POST["time"]));
    $errors["time"] = "Time is invalid";
  }


  if ($va->validate($_POST["name"], max: 255)) {
    $errors["name"] = "name cannot be empty or too big";
  }

  if ($va->validate($_POST["location"], max: 255)) {
    $errors["location"] = "Location empty or too big";
  }




  if (empty($errors)) {
    $id = $_GET["id"];
    $name = $_POST["name"] ?? "";
    $location = $_POST["location"] ?? "";
    $date = $_POST["date"] ?? "1999-12-31 23:59:59";

    $params[":id"] = $id;
    $params[":name"] = $name;
    $params[":location"] = $location;
    $params[":date"] = date("Y-m-d H:i:s", strtotime($_POST["time"]));

    $db->execute("UPDATE events SET NAME=:name, location=:location, date_and_time=:date WHERE id=:id", $params);

    header("Location: /");
    die();
  }

}

$page_title = "Edit";
require "views/event-edit.view.php";
