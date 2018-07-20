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

if($_SERVER['HTTP_HOST'] != "localhost") {
    require_once("requires/functions.php");
}else{
    require_once("requires/localhost_functions.php");
}
saveIP();

define("BUILD" , "1.0.2");