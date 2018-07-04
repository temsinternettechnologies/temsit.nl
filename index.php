<?php
require_once("init.php");
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    require_once("template/main/head.php");
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

require_once("template/main/navbar.php");
require_once("template/sub/header-quote.php");
require_once("template/sub/wat_doen_wij.php");
require_once("template/sub/features-wat_gebruiken_wij.php");
require_once("template/sub/showcase-2x3-wat_gebruiken_wij.php");
require_once("template/sub/testimonials-full.php");
require_once("template/sub/cal-to-action.php");
require_once("template/main/footer.php");
require_once("template/main/scripts.php");
?>

</body>

</html>
