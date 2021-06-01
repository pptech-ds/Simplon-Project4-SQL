<?php
if(!isset($_GET['s'])) {
    // die('Parameter requested !');
    header('location: index.php');
}

require 'view/sqlCon.php';
require 'view/reqSearch.php';

try {
    $query = $reqSearch;

    $req = $dbh->prepare($query);
    $req -> bindValue(':s', '%'.$_GET['s'].'%', PDO::PARAM_STR);
    $req -> execute();
    $req ->setFetchMode(PDO::FETCH_ASSOC);
    $tab = $req->fetchAll();
    $req ->closeCursor();

    $pageTitle = 'Search Result for'.$_GET["s"];

    require 'view/header.php';
?>

<h1>Search Result for "<?= $_GET["s"] ?>"</h1>

<?php
    require 'view/allPosts.php';
    require 'view/footer.php';
    
    $dbh = null;
    
    // echo 'End of Request !';
} catch (PDOException $e) {
    print "Error !: " . $e->getMessage() . "<br/>";
    die();
}
