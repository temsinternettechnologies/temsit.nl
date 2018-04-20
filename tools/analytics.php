<?php
require_once "../glass/core/init.php";

switch ($_GET['a']) {
    case "connect":
        $ip = sha1(@$_SERVER['HTTP_CLIENT_IP'] ?: @$_SERVER['HTTP_X_FORWARDED_FOR'] ?: @$_SERVER['REMOTE_ADDR']);
        $arr = array("connection" => TRUE, "TID" => $ip, "date" => date("Y-m-d"));
        if (!Database::select(sprintf("select id from analytics where TID = '%s'", $ip))) {
            if ($r = Database::insert("analytics", $arr)) {
                $_SESSION["TID"] = ($ip);
            }
        }else{
            $arr = array("connection" => TRUE, "date" => "NOW()");
            if ($r = Database::update("analytics", $arr, "TID", $ip)) {
                $_SESSION["TID"] = ($ip);
            }
        }
        break;
    case "disconnect":
        $ip = sha1(@$_SERVER['HTTP_CLIENT_IP'] ?: @$_SERVER['HTTP_X_FORWARDED_FOR'] ?: @$_SERVER['REMOTE_ADDR']);
        $arr = array("connection" => 0);
        if ($r = Database::update("analytics", $arr, "TID", $ip)) {
            $_SESSION["TID"] = ($ip);
        }
        break;
}