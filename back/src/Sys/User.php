<?php

namespace App\Sys;

class User {
  private \App\Sys\Connection $Connection;

  private bool $auth = false;
  private int $id = 0;

  public function __construct(\App\Sys\Connection $Connection)
  {
    $this->Connection = $Connection;

    $headers = apache_request_headers();

    $data = (isset($headers["Authorization"])) ? explode(":", $headers["Authorization"]) : [];

    if (count($data) >= 2) {
      $userId = intval($data[0]);
      $sessionHash = $data[1];

      if ($user = $this->Connection->fetch("SELECT * FROM users WHERE id = ?", array($userId))) {
        if ($sessionHash === $user["session_hash"]) {
          $this->auth = true;
          $this->id   = $user["id"];
        }
      }
    }
  }

  public function isAuth() :bool {
    return $this->auth;
  }

  public function getId() :int {
    return $this->id;
  }
}