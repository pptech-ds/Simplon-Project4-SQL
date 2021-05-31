<?php
    foreach($tab as $row) {
    
?>

        <h2><?= $row['post_title'] ?></h2>
        <p><?= $row['post_content'] ?></p>
        <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>
      

    

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