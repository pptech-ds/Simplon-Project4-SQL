<?php
    foreach($tab as $row) {
?>
        <div class="card text-white bg-primary mb-3" style="max-width: 100%;">
        <div class="card-header"><h2><a href="post.php?id=<?= $row['ID'] ?>"><?= $row['post_title'] ?></a></h2></div>
        <div class="card-body">
            <p class="card-text"><?= $row['post_content'] ?></p>
            <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>
        </div>
        </div>
<?php
    }
