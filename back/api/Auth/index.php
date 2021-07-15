<?php

# CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE, PATCH, OPTIONS");
header("Access-Control-Allow-Headers: *");

# Will Send for preflight request status code 200
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
  exit(http_response_code(200));
}

# Autoload
require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";

# Display all errors (dev)
$ErrorsHandler = new App\Sys\ErrorsHandler();
$ErrorsHandler->displayAllErrors();

# Get config data from .env
$EnvReader = new App\Sys\EnvReader();
$envConfig = $EnvReader->getEnv();

$Auth = new App\Auth(
  new App\Sys\Connection($envConfig["DB_HOST"], $envConfig["DB_NAME"], $envConfig["DB_USERNAME"], $envConfig["DB_PASSWORD"]),
  new App\Sys\Validator(),
  new App\Sys\RequestBodyReader(),
  new App\Sys\Messenger(),
  new App\Sys\RandomStr()
);

$Auth->auth();