<?php
$user = 'root';
$pass = '';
$dbname = 'pepinieres_baches_2';
$host = 'localhost';

try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}

?>