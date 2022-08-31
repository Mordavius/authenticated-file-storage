<?php
if ($_SESSION["loggedin"] == true){
    header("Location: /folders/".$_SESSION["uniqueid"]);
}
else {
    header("Location: /register");
}
