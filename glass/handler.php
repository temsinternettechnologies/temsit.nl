<?php
require_once("../glass/core/init.php");

switch ($_GET['a']){
    case 'exit':
        Cookies::deleteCookie("GID");
        session_destroy();
        header("Refresh:0");
        break;
}