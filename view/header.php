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

?>

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