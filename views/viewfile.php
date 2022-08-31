<?php

require_once ($_SERVER["DOCUMENT_ROOT"]."/backend/getfiles.php");
$file = getFiles::getFile($user, $id);

echo $file["path"];
