<?php
$category = Database::select("select * from blog_category");
if (isset($_GET['cat'])){
    $catid = $_GET['cat'];
}else if (isset($_GET['id'])){
    $catid = Database::select(sprintf("select category_id from blogs where id = %d", Database::escape($_GET['id'])))[0]->category_id;
}
?>
<nav class="navbar navbar-light navbar-expand text-white bg-primary static-top mb-2" style="box-shadow:0 0 5px #aaa; z-index: 99;">

    <div style="overflow: auto; white-space: nowrap;">
        <ul class="navbar-nav mr-auto container">
            <?php
            foreach ($category as $cat) {
                ?>
                <li class="nav-item">
                    <a href="/blog/<?= $cat->id ?>/" class="nav-link text-light" style="<?php if($cat->id == $catid){ echo 'border-bottom: solid 2px #f0f0f0';}?>"
                       rel="noopener"><?= $cat->title ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>