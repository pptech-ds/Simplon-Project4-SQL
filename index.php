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
    var_dump($dbh);
    echo 'Connexion etablished !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}



try {
    $tab = $dbh->query('SELECT 
                            post_title, 
                            LEFT(post_content, 100), 
                            post_date, 
                            display_name  
                        FROM wp_posts, wp_users
                        WHERE post_type = "post"
                            AND post_status = "publish"
                            AND post_author = wp_users.ID');
    var_dump($tab);

    foreach($tab as $row) {
        // print_r($row);
        var_dump($row);
    }
    $dbh = null;
    
    echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
?>