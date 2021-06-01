<?php

$user = 'root';
$pass = '';
$dbname = 'pepinieres_baches_2';
$host = 'localhost';


try {
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    // echo $dsn;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO($dsn, $user, $pass, $options);
    // var_dump($dbh);
    // echo 'Connexion etablished !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}



try {
    $query = '  SELECT 
                    wp_posts.ID,
                    post_title, 
                    post_content,
                    LEFT(post_content, 100) AS post_content_tr, 
                    post_date, 
                    display_name  
                FROM wp_posts, wp_users
                WHERE post_type = "post"
                    AND post_status = "publish"
                    AND post_author = wp_users.ID
                    ORDER BY post_date DESC';

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();
?>

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SQL first steps</title>
    </head>
    <body>
        <h1>My SQL first steps</h1>

<?php
    foreach($tab as $row) {
    
?>

        <h2><a href="allInOneFilePost.php?id=<?= $row['ID'] ?>"><?= $row['post_title'] ?></a></h2>
        <p><?= $row['post_content'] ?></p>
        <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>
      

    </body>
    </html>

<?php
    }
    // var_dump($tab);

    // foreach($tab as $row) {
    //     // print_r($row);
    //     var_dump($row);
    // }
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
?>