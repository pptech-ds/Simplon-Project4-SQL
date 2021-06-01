<?php
// $post_id = $_GET['id'];

// echo $_GET['id'];
// die('test');

$query = '  SELECT post_title, post_content, post_date, display_name  
                FROM wp_posts, wp_users
                WHERE post_author = wp_users.ID
                    AND wp_posts.ID = ' . $_GET["id"];
?>