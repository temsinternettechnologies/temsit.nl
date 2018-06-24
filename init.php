<?php
require_once("classes/Database.class.php");

define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "root");
define("DATABASE", "temsit");
define("PORT", "3306");

new Database(HOST,USERNAME,PASSWORD,DATABASE, PORT);

require_once("functions.php");