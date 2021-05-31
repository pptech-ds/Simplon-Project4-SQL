<?php
    foreach($tab as $row) {
?>

        <h2><a href="post.php?id=<?= $row['ID'] ?>"><?= $row['post_title'] ?></a></h2>
        <p><?= $row['post_content'] ?></p>
        <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>

<?php
    }
?>