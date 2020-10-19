<?php
    require_once('app/FolderClass.php');
    session_start();
    $folder = new FolderClass();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folder & File- Folder List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Create Folder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list-folder.php">List of Folder</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <br><br><br>
                <?php
                if(isset($_SESSION['success'])){
                echo $alert = <<<EOD
                    <div class="alert alert-success" role="alert">
                        {$_SESSION['success']}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                EOD;
                    unset($_SESSION['success']);
                }
                ?>
                <br>
                <h1>List Of Folders</h1>
                <ul>
                    <?php 
                        foreach($folder->index() as $folder){
                            $folders = <<<EOD
                            <li>{$folder} <a href="#" onclick="delFol('{$folder}')">Delete</a></li>
                            EOD;
                            echo $folders;

                            $form = <<<EOD
                            <form id="rf{$folder}" action="submit/folder_delete.php" method ="POST" style="display: none;">
                            <input type="text" name="folder_name" value={$folder}>
                            </form>
                            EOD;

                            echo $form;
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        function delFol(folder){
            confirm("Are you sure?");
            $( "#rf"+folder ).submit();
        }
    </script>
</body>
</html>