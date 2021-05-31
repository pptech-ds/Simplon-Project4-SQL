<?php

try {
    $query = '  SELECT 
                    post_title, 
                    post_content,
                    LEFT(post_content, 100) AS post_content_tr, 
                    post_date, 
                    display_name  
                FROM wp_posts, wp_users
                WHERE post_type = "post"
                    AND post_status = "publish"
                    AND post_author = wp_users.ID';

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();
?>