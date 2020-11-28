<?php
    include_once ("database/db.php");
    $rows = Select("SELECT id, title FROM categories ORDER BY id");
?>

<div class="col-sm-4">
    <ul class="nav nav-pills flex-column nav-left">
        <?php
            foreach ($rows as $row){
        ?>
            <li class="nav-item">
                <a class="nav-link" href="?cat=<?=$row['id']?>"><?=$row['title']?></a>
            </li>
        <?php } ?>
    </ul>
</div>