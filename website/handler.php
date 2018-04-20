<?php
require_once("../glass/core/init.php");

switch ($_GET['a']){
    case "save":
        $check = Database::select(sprintf("select * from subscribers where email = '%s'", Database::escape($_GET["email"])));
        if($check) {
        echo "exists";
        }else{
            $ip = sha1(@$_SERVER['HTTP_CLIENT_IP'] ?: @$_SERVER['HTTP_X_FORWARDED_FOR'] ?: @$_SERVER['REMOTE_ADDR']);
            $id = Database::insert("subscribers", array("email" => Database::escape($_GET["email"]), "hash" => sha1($ip)));
            if(!sendMail(array("mail" => Database::escape($_GET["email"]), "name" => "Nieuwe Gebruiker"), "Aanmelding bij temsit.nl", "Wat fijn dat je je hebt aangemeld bij temsit! <br/> Om jouw veiligheid te waarborgen vragen wij je om op <a href='http://www.temsit.nl/email/?a=validate&auth=" . sha1($ip) . "&id=".$id."'>deze</a> link te klikken om je definitief in te schrijven voor de nieuwsbrief.<br/>Alvast bedankt!")){
                Database::delete("subscribers", $id);
                echo "error";
            }
        }
        echo "success";
        break;
}