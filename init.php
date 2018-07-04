<?php
require_once("classes/Database.class.php");
require_once("classes/Cookies.class.php");

define("HOST", "localhost");
define("USERNAME", "temsit");
define("PASSWORD", "QuintIan055");
define("DATABASE", "temsit");
define("PORT", "3306");

new Database(HOST,USERNAME,PASSWORD,DATABASE, PORT);

define("COOKIE_EXPIRATION", time() + (86400 * (365 / 12)));

new Cookies(COOKIE_EXPIRATION);

require_once("requires/functions.php");

$now = date("d-m-y h:m:s");
if($id = Database::select(sprintf("select id from visitors where ip = '%s'", getIP()))[0]->id) {
    Database::update("visitors", array("last_seen" => $now), "id", $id);
}else {
    Database::insert("visitors", array("ip" => getIP(), "alias" => null, "last_seen" => $now));
}
