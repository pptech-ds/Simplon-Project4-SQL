<?php
$post_id = $_GET['id'];

$reqOnePost = " SELECT 
                    wp_posts.ID,
                    post_title, 
                    post_content,
                    LEFT(post_content, 100) AS post_content_tr, 
                    post_date, 
                    display_name  
                FROM wp_posts, wp_users
                WHERE wp_posts.ID = $post_id";
?>