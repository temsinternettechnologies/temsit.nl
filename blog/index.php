<?php
require "../init.php";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    loadTemplate("head");
    ?>
</head>

<body>
<style>
    header.masthead {
        padding: 0;
    }
    .testimonials .testimonial-item img {
        box-shadow: 0 5px 5px 0 rgba(1,1,1,0.5);
    }
    .testimonials-no-image {
        background-color: transparent !important;
    }
</style>
<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("../partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

loadTemplate("navbar");
loadSub("testimonials");
loadSub("wij");
loadSub("cal-to-action");
loadTemplate("footer");
loadTemplate("scripts");?>

</body>

</html>
