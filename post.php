<?php

require 'view/header.php';
require 'view/sqlCon.php';

try {
    $query = '  SELECT post_title, post_content, post_date, display_name  
                FROM wp_posts, wp_users
                WHERE post_author = wp_users.ID
                    AND wp_posts.ID = ' . $_GET["id"];

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $row = $req->fetch();
    $req ->closeCursor();

    require 'view/onePost.php';

    require 'view/footer.php';
    
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
?>