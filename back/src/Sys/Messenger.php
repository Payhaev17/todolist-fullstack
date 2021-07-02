<?php

namespace App\Sys;

class Messenger {
  public function sendResponse(int $code, mixed $body) {
    $this->setReponseCode($code);
    $this->sendBody($body);
  }

  private function setReponseCode(int $code) {
    http_response_code($code);
  }

  private function sendBody(mixed $body) {
    exit(json_encode($body));
  }
}