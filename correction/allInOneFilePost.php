<?php

if(!isset($_GET['id'])) {
    // die('Parameter requested !');
    header('location: allInOneFile.php');
}

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
    $query = '  SELECT post_title, post_content, post_date, display_name  
                    FROM wp_posts
                    INNER JOIN wp_users ON post_author = wp_users.ID
                    WHERE wp_posts.ID = ' . $_GET["id"];

    // die($query);

    $req = $dbh->query($query);
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $row = $req->fetch();
    $req ->closeCursor();
?>

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SQL first steps - <?= $row['post_title'] ?></title>
    </head>
    <body>
        <h1><?= $row['post_title'] ?></h1>

        <h1><?= $row['post_title'] ?></h1>
        <p><?= $row['post_content'] ?></p>
        <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>
        <h2><a href="allInOneFile.php">Get Back to main page</a></h2>
      

    </body>
    </html>

<?php
    
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