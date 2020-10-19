<?php

class FolderClass{

    public $folders = array();
    
    /**
     * Display all the folders inside store folder
     * 
     * @return folder_name 
     */
    public function index(){
        $dir    = 'store';
        return $this->folders = array_diff(scandir($dir), array('..', '.'));
    }


    /**
     * Create folders inside store folder
     * 
     */
    public function create(){
        $folder_name = $_POST['folder_name'];
        if(is_dir("../store/".$folder_name)){
            session_start();
            $_SESSION["error"] = "Folder Already Exist!";
            header("Location: ../index.php");
            die();
        }
        else{
            mkdir("../store/".$folder_name, 0700);
            session_start();
            $_SESSION["success"] = "Folder Sucessfully Created!";
            header("Location: ../index.php");
            die();
        }
    }

    /**
     * Remove folders from store folder
     * 
     */

    public function destroy(){
        $folder_name = $_POST['folder_name'];
        if(is_dir("../store/".$folder_name)){
            rmdir("../store/".$folder_name);
            session_start();
            $_SESSION["success"] = "Folder Successfully Deleted!";
            header("Location: ../list-folder.php");
            die();
        }
    }
    
}