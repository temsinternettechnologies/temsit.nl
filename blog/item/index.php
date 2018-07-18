<?php
require "../../init.php";
$blogId = Database::escape($_GET["id"]);
$blog = Database::select(sprintf("SELECT * FROM blogs where id = %d", $blogId))[0];

function getCategory($id){
    try{
        $category = Database::select(sprintf("select * from blog_category where id = %d", $id))[0];
        return $category->title;
    }catch (Exception $e){
        return null;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    //loadTemplate("head");
    loadTemplate("blog-head");
    ?>
</head>

<body style="background-color: white ">

<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("/partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

loadTemplate("navbar");
loadTemplate("blog-navbar");

if (count($blog)) {
    ?>
    <div class="container p-0" style="">
        <div style="position: relative; height: 300px; background: url('/img/<?= $blog->img ?>'); background-position: center; background-size: cover; background-repeat: no-repeat">
        <p style="position:absolute; bottom: 0px; right: 20px; font-size: 0.8rem; color: #aaa;"><?= getCategory($blog->category_id) ?></p>
        </div>
        <h2 class="p-3"><?= $blog->subject ?></h2>
        <p class="p-3 mb-0"><?= $blog->content ?></p>
    </div>
    <?php
} else {
    ?>
    <div style='height: 73vh; border-bottom: solid 1px #e0e0e0;'>
        <h3 class='lead text-center m-5 p-5'>
            Het door jou bezochte blog is op dit moment niet bereikbaar, probeer het later opnieuw.
        </h3>
    </div>
    <?php
}
loadTemplate("footer");
loadTemplate("scripts");
?>
</body>

</html>
