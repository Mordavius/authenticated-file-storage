<?php
//this shouldn't happens thanks to the routing, but just in case.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit ("Wrong request method");
}

//csrf protection built into phprouter library
if (!is_csrf_valid()){
    header("Location: /");
    exit();
}

$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

if ($email === false || $_POST["password"] != $_POST["password-verify"]){
    header("Location: /");
}
else {
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
}

$uniqueid = uniqid();


require_once("database.php");
$database = Database::getInstance();
$conn = $database->getConnection();
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO users (uniqueid, email, password) VALUES (?,?,?)";
$stmnt = $conn->prepare($query);
$stmnt->execute([$uniqueid, $email, $password]);
$_SESSION["uniqueid"] = $uniqueid;
header("Location: /");