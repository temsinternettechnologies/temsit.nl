<?php
require_once "../../glass/core/init.php";
switch ($_GET["a"]){
    case 'validate':
        if($hash = Database::select(sprintf("select id from subscribers where hash = '%s' and is_active = false and id = %d", Database::escape($_GET['auth']), Database::escape($_GET['id'])))){
           if(!Database::update("subscribers", array("is_active" => true), "id", $hash[0]->id)){
               echo "Er gaat hier iets goed fout...";
           }else{
               echo "Hoera, je bent aangemeld!";
           }
        }else{
            echo "Er gaat hier iets goed fout...";
        }
        break;
}