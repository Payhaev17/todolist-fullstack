<?php

namespace App\Sys;

class Validator {
  public function loginValid(string $login) :bool {
    if (strlen($login) < 2 || strlen($login) > 14) return false;

    return preg_match("/^[a-z ,.'-]+$/i", $login);
  }

  public function passwordValid(string $password) :bool {
    if (strlen($password) < 5 || strlen($password) > 20) return false;

    return true;
  }
}