<?php
require_once("backend/database.php");

$database = Database::getInstance();
$conn = $database->getConnection();

$query = $conn->query("SELECT uniqueid, email, password FROM users where id = 1");
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();
echo $result['email'];
echo $result['uniqueid'];