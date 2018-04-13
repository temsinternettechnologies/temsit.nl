<?php
error_reporting(0);
function require_class($classname)
{
    include_once("../../glass/classes/" . $classname . ".class.php");
    include_once("../glass/classes/" . $classname . ".class.php");
}

spl_autoload_register('require_class');

define("BUILD", dechex(2));

define("HOST_ONLINE", "localhost");
define("USERNAME", "temsit");
define("PASSWORD", "QuintIan055");
define("DATABASE", "temsit");

new Database(HOST_ONLINE, USERNAME, PASSWORD, DATABASE);

define("COOKIE_EXPIRATION", time() + 60 * 60 * 24 * 30); // 30 Days
define("COOKIE_PATH", "/");

new Cookies(COOKIE_EXPIRATION, COOKIE_PATH);

session_start();