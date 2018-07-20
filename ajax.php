<?php
require_once("init.php");

switch ($_GET['a']) {
    case "cookie_accept":
        $ip_hash = sha1(getIP());
        Cookies::setCookie("TID", $ip_hash);
        return true;
        break;

    case "save":
        if (!Database::select("select location from visitors where ip = '%s'", getIP())) {
            $data = urldecode($_GET['data']);
            Database::update("visitors", array("location" => $data), "ip", getIP());
        }
        break;
    default:
        return false;
        break;
}
