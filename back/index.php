<?php

namespace App;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

if (isset(apache_request_headers()["Authorization"])) {
  $authHeader = apache_request_headers()["Authorization"];

  $authData = explode(":", $authHeader);
} else {
  echo "Hello!";
}