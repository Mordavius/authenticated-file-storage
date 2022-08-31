<?php
class User
{


  public static function userVerified($user)
  {
    $verified = $_SESSION["uniqueid"] == $user && $_SESSION["loggedin"] == true ? true : false;
    return $verified;
  }

  public static function userVerifiedUpload()
  {
    $verifiedupload = isset($_SESSION["uniqueid"]) && $_SESSION["loggedin"] == true ? true : false;
    return $verifiedupload;
  }
}