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
    if (!isset($_POST["description"])) {
        $errors["location"] = "no location set";
    }


    if ($va->validate($_POST["name"], max: 50)) {
        $errors["name"] = "name cannot be empty or too big";
    }

    if ($va->validate($_POST["description"], max: 255)) {
        $errors["description"] = "description empty or too big";
    }




    if (empty($errors)) {
        $id = $_GET["id"];
        $name = $_POST["name"] ?? "";
        $description = $_POST["description"] ?? "";

        $params[":id"] = $id;
        $params[":name"] = $name;
        $params[":description"] = $description;

        $db->execute("
            UPDATE collective 
            SET NAME=:name, DESCRIPTION=:description
            WHERE id=:id",
            $params
        );

        header("Location: /");
        die();
    }

}

$page_title = "Edit";
require "views/collective-edit.view.php";
