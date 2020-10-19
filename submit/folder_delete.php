<?php

require_once "../app/FolderClass.php";
$folder = new FolderClass();

if(isset($_POST['folder_name'])){
    $folder->destroy();
 } 