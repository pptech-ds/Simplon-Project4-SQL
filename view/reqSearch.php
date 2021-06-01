<?php
// $post_id = $_GET['id'];

// echo $_GET['id'];
// die('test');

$reqSearch = 'SELECT 
wp_posts.ID,
post_title, 
post_content,
post_date, 
display_name  
FROM wp_posts
INNER JOIN wp_users ON post_author = wp_users.ID
WHERE (post_type = "post"
AND post_status = "publish")
AND (post_title LIKE :s  
OR post_content LIKE :s)  
ORDER BY post_date DESC';
