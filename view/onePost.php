
<div class="card text-white bg-primary mb-3" style="max-width: 100%;">
<div class="card-header"><h2><?= $row['post_title'] ?></h2></div>
<div class="card-body">
    <p class="card-text"><?= $row['post_content'] ?></p>
    <p>Writtent by: <?= $row['display_name'] ?> - Date: <?= $row['post_date'] ?></p>
</div>
</div>

<h2><a href="index.php">Get Back to main page</a></h2>
