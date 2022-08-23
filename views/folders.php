<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/backend/user.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/backend/getfiles.php");
if (!User::userVerified($user)){
    header("HTTP/1.0 403 Forbidden");
    header("Location: /"); 
    die('You are not allowed to access this folder.'); 
}
$files = getFiles::getAllFiles($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION["uniqueid"]. "'s folder"?></title>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
<link rel="stylesheet" href="../assets/css/grid.css" type="text/css">
<link rel="stylesheet" href="../assets/css/modal.css" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<script src="https://kit.fontawesome.com/034d85f3be.js" crossorigin="anonymous"></script>
</head>
<body>
    <a class="button is-danger logout"  href="/logout">Logout</a>
<div id="myModal" class="modal">

<div class="modal-content">
<span class="close">&times;</span>
</div>

</div>
    <div class="wrapper">
        <div class="grid"><div class="dropit"><form action="/upload/" class="dropzone" id="upload"></form></div></div>
    <?php 
      // called on page load  
    foreach ($files as $file){
            $display;
            
            //hacky but easiest thing i could come up with
            switch (true){
                case str_contains($file["type"], "video"):                    
                    $display = "<video class='dimensions' src=".$file["path"]." controls></video>";
                    break;
                case str_contains($file["type"], "audio"):
                    $display = "<audio src=".$file["path"]." type=".$file["type"]." controls></audio>";
                    break;
                case str_contains($file["type"], "image"):
                    $display = "<image class='dimensions' id=".$file["owner"]."/".$file["id"]." src=".$file["path"]." >";
                    break;
                default:
                $display = "<a href=".$file["path"]." target = '_blank'><i class='fa-solid fa-circle-question fa-10x'></i></a>";
                break;    
            }
                echo "<div class='grid'>".$display."<div class='namecontainer'><p>".$file["name"]."</p></div><button class='button is-danger' id=".$file["owner"]."/".$file["id"].">Delete</button></div>"
            
            ?>
    <?php
    }
    ?>

    </div>
<!-- </section> -->
    
    <script>
        Dropzone.options.upload = {
            paramName: "files",
            parallelUploads:10,
            uploadMultiple:true,
            // i know this isn't how it's supposed to work
            init:function (){
            this.on("queuecomplete", function (){
            location.reload();
            });
        }
    };
    </script>
    <script src="../assets/javascript/deletebutton.js"></script>
    <script src="../assets/javascript/bigpreview.js"></script>    
</body>
</html>




