<?php
require_once("database.php");

$database = Database::getInstance();
$conn = $database->getConnection();

$stmnt = $conn->prepare("SELECT uniqueid, email, password FROM users where email = :email");
$stmnt->execute(array(':email' => $_POST["email"]));
$result = $stmnt->fetch();

if ($result["email"] == $_POST["email"] && password_verify($_POST['password'], $result['password'])) {
    $_SESSION["loggedin"] = true;
    $_SESSION["uniqueid"] = $result["uniqueid"];
}
header("Location: /");