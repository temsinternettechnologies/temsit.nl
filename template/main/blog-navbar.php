<?php
$category = Database::select("select * from blog_category");
?>
<nav class="navbar navbar-light text-white bg-primary static-top mb-2" style="box-shadow:0 0 5px #aaa; z-index: 99;">
    <div class="container">
        <?php
        foreach ($category as $cat) {
            ?>
            <a href="/blog/?cat=<?=$cat->title?>" class="anchor-no-style" rel="noopener"><?=$cat->title?></a>
            <?php
        }
        ?>
    </div>
</nav>