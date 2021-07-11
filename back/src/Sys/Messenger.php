<?php

namespace App\Sys;

class Messenger {
  public function sendResponse(int $code, mixed $body) :void {
    $this->setReponseCode($code);
    $this->sendBody($body);
  }

  private function setReponseCode(int $code) :void {
    http_response_code($code);
  }

  private function sendBody(mixed $body) :void {
    exit(json_encode($body, JSON_NUMERIC_CHECK));
  }
}