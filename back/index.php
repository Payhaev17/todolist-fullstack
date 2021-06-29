<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

$authHeader = apache_request_headers()["Authorization"];

$authData = explode(":", $authHeader);