<?php
    require_once "../classes/Database.class.php";
    require_once "../classes/Cookies.class.php";

    define("BUILD", dechex(2));

    define("HOST_ONLINE", "localhost");
    define("USERNAME", "temsit");
    define("PASSWORD", "QuintIan055");
    define("DATABASE", "temsit");

    new Database(HOST_ONLINE, USERNAME, PASSWORD, DATABASE);

    define("COOKIE_EXPIRATION", time()+60*60*24*30); // 30 Days
    define("COOKIE_PATH", "/");

    new Cookies(COOKIE_EXPIRATION, COOKIE_PATH);

    session_start();
