<?php
    $hostname = 'localhost';
    $databaseName = 'todo';
    $username = 'root';
    $password = '';

    try {
        $connection = new PDO('mysql:host='.$hostname.';dbname='.$databaseName, $username, $password);
    }

    catch (PDOException $e){
        print "Error!:" .$e->getMessage(). "<br/>"; die();
    }
?>