<?php
function getCopyrightText()
{
    $date = date("Y");
    if ($date == "2018") {
        return $date;
    } else if (intval($date) > 2018) {
        return "2018 - " . $date;
    }
    return false;
}

function getIP()
{
    $ip = "unset";

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getRequestUri()
{
    if (getIP() != "::1") {
        $res = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"));
        if ($res) {
            return $res;
        } else {
            return $_SERVER['REQUEST_URI'];
        }
    } else {
        $len = strlen("temsit.nl") + 1;
        $res = substr($_SERVER['REQUEST_URI'], $len, 20);
        $res = substr($res, 0, strpos($res, "?"));
        if ($res) {
            return $res;
        } else {
            return $res = substr($_SERVER['REQUEST_URI'], $len, 20);
        }
    }
}

function saveIP()
{
    $now = date("d-m-y h:m:s");
    if ($id = Database::select(sprintf("select id from visitors where ip = '%s'", getIP()))) {
        Database::update("visitors", array("last_seen" => $now), "id", $id[0]->id);
    } else {
        Database::insert("visitors", array("ip" => getIP(), "alias" => null, "last_seen" => $now));
    }

}

function loadSub($file)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/template/sub/" . $file . ".php")) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/template/sub/" . $file . ".php");
    }
}

function loadTemplate($file)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/template/main/" . $file . ".php")) {
        require_once($_SERVER['DOCUMENT_ROOT'] . "/template/main/" . $file . ".php");
    }
}

