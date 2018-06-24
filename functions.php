<?php
function getCopyrightText(){
    $date = date("Y");
    if ($date == "2018"){
        return $date;
    }else if (intval($date) > 2018){
        return "2018 - " . $date;
    }
    return false;
}