<?php

// define('username','root');
// define('password','');
// define('host', 'localhost');
// define('dbname','todoapp');

$User = 'root';
$pass = '';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// $pdo = new PDO( 'mysql:host=host;dbname=dbname','username','password',$options);
$pdo = new PDO('mysql:host=localhost;dbname=todoapp', $User, $pass);





?>