<?php

# CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, PATCH");
header("Content-Type: application/json");

# Autoload
require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";

# Display all errors (dev)
$ErrorsHandler = new App\Sys\ErrorsHandler();
$ErrorsHandler->displayAllErrors();

# Get config data from .env
$EnvReader = new App\Sys\EnvReader();
$envConfig = $EnvReader->getEnv();

# DB connection
$Connection = new App\Sys\Connection($envConfig["DB_HOST"], $envConfig["DB_NAME"], $envConfig["DB_USERNAME"], $envConfig["DB_PASSWORD"]);

$UserTodos = new App\UserTodos(
  $Connection,
  new App\Sys\Validator(),
  new App\Sys\RequestBodyReader(),
  new App\Sys\Messenger(),
  new App\Sys\User($Connection)
);
$UserTodos->handleRequest();