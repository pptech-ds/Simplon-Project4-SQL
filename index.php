<?php


require 'view/sqlCon.php';
require 'view/reqAllPosts.php';

try {
    $query = $reqAllPosts;

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();

    $pageTitle = 'Home';

    require 'view/header.php';
    require 'view/allPosts.php';
    require 'view/footer.php';
    
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
