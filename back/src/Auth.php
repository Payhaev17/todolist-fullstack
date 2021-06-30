<?php

namespace App;

class Auth {
  private \App\Sys\Connection $connection;

  public function __construct(\App\Sys\Connection $connection)
  {
    $this->connection = $connection;
  }
}