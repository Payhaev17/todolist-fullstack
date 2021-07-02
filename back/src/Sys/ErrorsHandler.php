<?php

namespace App\Sys;

class ErrorsHandler {
  public function displayAllErrors() :void {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  }
}