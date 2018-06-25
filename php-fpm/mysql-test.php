<?php
    $mysql_user = $_ENV['mysql_user'];
    $mysql_password = $_ENV['mysql_password'];
    $mysql_host = $_ENV['mysql_host'];
    $mysql_database = $_ENV['mysql_database'];

    if (!isset($mysql_user) || !isset($mysql_password) || !isset($mysql_host) || !isset($mysql_database)) {
        die("Make sure all mysql connection configs are set");
    } else {
        try {
            $dbh = new PDO('mysql:host=' + $mysql_host +';dbname=' + $mysql_database, $mysql_user, $mysql_password);
            print('Connection to ' + $mysql_database + ' successfull');
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

?>
