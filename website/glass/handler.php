<?php
require_once("../core/init.php");

switch ($_GET['a']){
    case 'exit':
        Cookies::deleteCookie("GID");
        session_destroy();
        break;
}