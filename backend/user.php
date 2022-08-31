<?php
class User
{


  public static function userVerified($user)
  {
    return $_SESSION["uniqueid"] == $user && $_SESSION["loggedin"] == true;
  }

  public static function userVerifiedUpload()
  {
    return isset($_SESSION["uniqueid"]) && $_SESSION["loggedin"] == true;
  }
}