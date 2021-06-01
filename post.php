<?php
if(!isset($_GET['id'])) {
    // die('Parameter requested !');
    header('location: index.php');
}

require 'view/sqlCon.php';
require 'view/reqOnePost.php';

try {
    $query = $reqOnePost;

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $row = $req->fetch();
    $req ->closeCursor();

    $pageTitle = $row['post_title'];

    require 'view/header.php';

    require 'view/onePost.php';

    require 'view/footer.php';
    
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
