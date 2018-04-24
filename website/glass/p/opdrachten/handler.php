<?php
require_once("../../../core/init.php");

switch ($_GET['a']){
    case 'check':
        Database::update("assignments", array("done" => true), 'id', Database::escape($_GET["id"]));
        break;
}
