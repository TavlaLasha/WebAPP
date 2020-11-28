<?php
    include_once ("database/db.php");
    
    $query = "SELECT articles.id, articles.title, articles.text, articles.add_date, articles.view, 
                users.firstname, users.lastname FROM articles 
                INNER JOIN categoriestoarticles ON categoriestoarticles.article_id = articles.id
                INNER JOIN users ON users.id = articles.author_id
                ";
    if(isset($_GET["cat"])){
        $cat_id = $_GET["cat"];
        $query = $query . "WHERE categoriestoarticles.category_id=$cat_id ORDER BY articles.add_date DESC";
    }
    else if(isset($_GET['article'])){
        $article_id = $_GET['article'];
        Update("UPDATE articles SET view = view + 1 WHERE id=$article_id");
        $query = $query . "WHERE articles.id=$article_id";
    }
    else{
        $query = $query . "ORDER BY articles.add_date DESC LIMIT 10";
    }
    $rows = Select($query);
?>

<div class="col-sm-8">
    <?php
     if(!isset($_GET['article'])){
        foreach ($rows as $row){
    ?>
        <div class="article">
            <h2><?=$row['title']?></h2>
            <h5>Date:<?=$row['add_date']?> Author:<?=$row['firstname']?> <?=$row['lastname']?>  View:<?=$row['view']?> </h5>
            <p><?=Strip_tags(substr($row['text'], 0, 900))?> ...</p>
            <p><a href="?article=<?=$row['id']?>">სრულად ნახვა</a></p>
        </div>
    <?php } } else { ?>
         <div class="article">
             <h2><?=$rows[0]['title']?></h2>
             <h5>Date:<?=$rows[0]['add_date']?> Author:<?=$rows[0]['firstname']?> <?=$rows[0]['lastname']?>  View:<?=$rows[0]['view']?> </h5>
             <p><?=$rows[0]['text']?></p>
         </div>
    <?php } ?>
</div>
