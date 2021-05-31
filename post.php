<?php

require 'view/header.php';
require 'view/sqlCon.php';
require 'view/reqOnePost.php';

try {
    $query = $reqOnePost;

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();

    require 'view/allPosts.php';
?>
    <h2><a href="index.php">Get Back to main page</a></h2>
<?php
    require 'view/footer.php';
    
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
?>