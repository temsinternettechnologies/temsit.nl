<?php
require_once("classes/Database.class.php");
require_once("classes/Cookies.class.php");

define("HOST", "localhost");
define("USERNAME", "temsit");
define("PASSWORD", "QuintIan055");
define("DATABASE", "temsit");
define("PORT", "3306");

new Database(HOST,USERNAME,PASSWORD,DATABASE, PORT);

define("COOKIE_EXPIRATION", time() + (86400 * (365 / 12)));

new Cookies(COOKIE_EXPIRATION);

require_once("requires/functions.php");


// TODO add cookie message
if (!$value = Cookies::getCookie("TID")) {
    require_once("partials/cookies.php");
}else{
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}