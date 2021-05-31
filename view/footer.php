

    
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

        <h2><?= $row['post_title'] ?></h2>
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