<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/user.php");
if (!User::userVerifiedUpload()) {
    header('HTTP/1.0 403 Forbidden');
    die('You are not logged in or not authorised to upload');
}

require_once("database.php");
$database = Database::getInstance();
$conn = $database->getConnection();
$query = "INSERT INTO files (name, path, type, size, owner) VALUES (?,?,?,?,?)";
$stmnt = $conn->prepare($query);

$uniqueid = $_SESSION["uniqueid"];

$totalfiles = count($_FILES["files"]["name"]);

for ($i = 0; $i < $totalfiles; $i++) {


    //Needed vars
    $filename = preg_replace('/\s+/', '', $_FILES["files"]["name"][$i]);
    $filename = htmlspecialchars($filename);
    $newFilePath;
    $filetype = $_FILES["files"]["type"][$i];
    $filesize = $_FILES["files"]["size"][$i];

    $tmpFilePath = $_FILES["files"]["tmp_name"][$i];

    //upload
    if ($tmpFilePath != "") {
        $newFilePath = "./files/" . $uniqueid . $filename;
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            //save in db
            $stmnt->execute([$filename, "../" . $newFilePath, $filetype, $filesize, $uniqueid]);
        }
    }
}
