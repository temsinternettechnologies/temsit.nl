<?php
require_once("init.php");
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    loadTemplate("head");
    ?>
</head>

<body>
<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

loadTemplate("navbar");
loadSub("header");
loadSub("sub-header");
loadSub("features");
loadSub("showcase");
loadSub("testimonials");
loadSub("cal-to-action");
loadTemplate("footer");
loadTemplate("scripts");
?>

</body>

</html>
