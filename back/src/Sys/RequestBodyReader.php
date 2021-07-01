<?php

namespace App\Sys;

use stdClass;

class RequestBodyReader {
  public function getBody() :mixed {
    if (file_get_contents("php://input")) {
      return $this->getPayloadData();
    } else if (!empty($_POST)) {
      return $this->getFormData();
    } else {
      return false;
    }
  }

  private function getPayloadData() :array {
    return (array) json_decode(file_get_contents("php://input"));
  }

  private function getFormData() :array {
    return $_POST;
  }
}