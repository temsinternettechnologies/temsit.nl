<?php
require_once("init.php");

switch ($_GET['a']){
    case "cookie_accept":
        $ip_hash = sha1(getIP());
        Cookies::setCookie("TID", $ip_hash);
        return true;
    break;

    default:
        return false;
    break;
}
