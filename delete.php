<?php
    require 'config.php';
    
    $id = $_GET['id'];
    $mysql = "DELETE FROM todo WHERE id=$id";
    $pdostatemnt = $pdo -> prepare($mysql);
    $pdostatemnt -> execute();

    header("location:index.php");

?>