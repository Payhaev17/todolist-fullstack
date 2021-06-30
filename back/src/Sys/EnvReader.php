<?php

namespace App\Sys;

class EnvReader {
  private array $env;

  public function __construct()
  {
    $this->env = parse_ini_file($_SERVER["DOCUMENT_ROOT"] ."/.env");
  }

  public function getEnv() {
    return $this->env;
  }
}