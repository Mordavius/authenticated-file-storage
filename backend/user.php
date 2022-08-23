<?php
    Class User{
    public $user;

    public static function userVerified($user){
        
        if ($_SESSION["uniqueid"] == $user && $_SESSION["loggedin"] == true){
                return true;
        }
        else {
            return false;
        }
    }

   public static function userVerifiedUpload(){
     if (isset($_SESSION["uniqueid"]) && $_SESSION["loggedin"] == true){
        return true;
     }
     else {
        return false;
     }
   }
}