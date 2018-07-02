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
    $request = "/";

    if (strpos($_SERVER['REQUEST_URI'], "temsit.nl")) {
        $array = explode("/", $_SERVER['REQUEST_URI']);
        foreach ($array as $key => $value) {
            if ($value != "temsit.nl" && $value != "") {
                $request .= $value . "/";
            }
        }
    } else if ($_SERVER['REQUEST_URI'] != "/") {
        $array = explode("/", $_SERVER['REQUEST_URI']);
        foreach ($array as $key => $value) {
            $request .= $value . "/";
        }
    }else {
        return "/";
    }
    return $request;
}