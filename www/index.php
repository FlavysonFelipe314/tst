<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Origin: *");

use App\Core\Core;

require_once "./vendor/autoload.php";
require_once "./Config/Config.php";

$Core = new Core();
$Core->run();


?>