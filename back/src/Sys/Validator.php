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

  public function todoTitleValid(string $title) :bool {
    $len = strlen($title);
    if ($len < 2 || $len > 40) return false;

    return true;
  }

  public function todoTextValid(string $text) :bool {
    $len = strlen($text);
    if ($len < 2 || $len > 255) return false;

    return true;
  }
}