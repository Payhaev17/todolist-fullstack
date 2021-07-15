<?php

namespace App\Sys;

class Messenger {
  public function sendResponse(array $body) :void {
    exit(json_encode($body, JSON_NUMERIC_CHECK));
  }
}