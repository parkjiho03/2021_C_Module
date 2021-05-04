<?php

session_start();

define("__DS", "/");
define("__ROOT", dirname(__DIR__));
define("__SRC", __ROOT . __DS . "src");
define("__VIEWS", __SRC . __DS . "Views");
define("__NIMGS", dirname(__ROOT . "../") . __DS . "nihcImage" . __DS);

require_once __ROOT . __DS . "autoloader.php";
require_once __ROOT . __DS . "lib.php";
require_once __ROOT . __DS . "web.php";