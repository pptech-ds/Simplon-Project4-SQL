<?php

$user = 'root';
$pass = '';


try {
    $dbh = new PDO('mysql:host=localhost;dbname=pepinieres_baches_2', $user, $pass);
    // foreach($dbh->query('SELECT * from FOO') as $row) {
    //     print_r($row);
    // }
    // $dbh = null;
    echo 'Fin du SQL!';
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>