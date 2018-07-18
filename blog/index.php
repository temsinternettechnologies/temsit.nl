<?php
require "../init.php";

$blogs = Database::select("SELECT * FROM blogs order by id desc limit 20");

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
    loadTemplate("head");
    ?>
</head>

<body style="background-color: white">

<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("../partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

loadTemplate("navbar");
loadTemplate("blog-navbar");


if (count($blogs)) {
    ?>
    <div class='blogs pt-2 pb-2'>
        <div class='container'>
            <div class='row no-gutters'>
                <?php
                $count = 0;
                foreach ($blogs as $blog) {
                    if ($count % 2 == 0) {
                        $class = "col-lg-6 col-md-6";
                    } else {
                        $class = "col-lg-5 offset-lg-2 col-md-5 offset-md-2";
                    }
                    ?>
                    <div class="blog" onclick="location.href = '/blog/item/?id=<?= $blog->id ?>'">
                        <img style="width: 100%;" src="../img/<?= $blog->img ?>" alt="<?= $blog->subject ?>">
                        <p class="text-center m-0"
                           style="font-size: 0.8rem; color: #aaa;"><?= getCategory($blog->category_id) ?></p>
                        <h4 class="text-center px-2 pb-3"><?= $blog->subject ?></h4>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div style='height: 73vh; border-top: solid 1px #e0e0e0; border-bottom: solid 1px #e0e0e0;'>
        <h3 class='lead text-center m-5 p-5'>
            Er zijn helaas geen blogs gevonden, probeer het later opnieuw.
        </h3>
    </div>
    <?php
}
loadTemplate("footer");
loadTemplate("scripts");
?>
</body>

</html>
