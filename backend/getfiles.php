<?php

require_once("database.php");
require_once("user.php");

class getFiles
{
    private static $_instance;
    public $conn;
    public $database;

    public static function getAllFiles($user)
    {
        $database = Database::getInstance();
        $conn = $database->getConnection();
        if (!User::userVerified($user)) {
            exit("something went wrong please try logging out and in again");
        }

        $stmnt = $conn->prepare("SELECT * FROM files where owner = :owner");
        $stmnt->execute(array(":owner" => $user));
        $result = $stmnt->fetchAll();
        return $result;
    }

    public static function getFile($user, $id)
    {
        $database = Database::getInstance();
        $conn = $database->getConnection();
        if (!User::userVerified($user)) {
            exit("You don't seem to have access to this file");
        }
        $stmnt = $conn->prepare("SELECT * FROM files where owner = :owner AND id = :id");
        $stmnt->execute(array(":owner" => $user, ":id" => $id));
        $result = $stmnt->fetch();
        return $result;
    }
}
