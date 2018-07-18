<?php
$category = Database::select("select * from blog_category");
?>
<nav class="navbar navbar-light navbar-expand-lg text-white bg-primary static-top mb-2" style="box-shadow:0 0 5px #aaa; z-index: 99;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#subnav"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="subnav">
        <ul class="navbar-nav mr-auto container">
            <?php
            foreach ($category as $cat) {
                ?>
                <li class="nav-item">
                    <a href="/blog/?cat=<?= $cat->title ?>" class="nav-link text-light"
                       rel="noopener"><?= $cat->title ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>