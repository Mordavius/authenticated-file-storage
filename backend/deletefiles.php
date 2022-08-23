<?php
    require_once("database.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/backend/user.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/backend/getfiles.php");
    
    if (!User::userVerified($user)){
    header('HTTP/1.0 403 Forbidden'); 
    die('You are not allowed to access this area.'); 
    }

    $database = Database::getInstance();
    $conn = $database->getConnection();

    $filenamequery = "SELECT name FROM files WHERE id=:id AND owner=:owner";
    $filenamestmnt = $conn->prepare($filenamequery);
    $filenamestmnt->execute([":id"=> $id, ":owner"=>$user]);
    $filename = $filenamestmnt->fetch();
 
    $name = $filename[0];
    $delquery = "DELETE FROM files WHERE owner=:owner AND name=:name";
    $delstmnt = $conn->prepare($delquery);
    $delstmnt->execute([":owner" => $user, ":name" => $name]);
    unlink("./files/".$user.$filename[0]);

?>