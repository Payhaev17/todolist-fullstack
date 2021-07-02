<?php

namespace App\Sys;

class RandomStr {
  private string $symbols = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  private string $digits = "0123456789";

  public function sessionHash() :string {    
    $hash = "";

    for($i = 0; $i < 15; ++$i) {
      $symbol = $this->symbols[ mt_rand(0, strlen($this->symbols) - 1) ];
      $digit = $this->digits[ mt_rand(0, strlen($this->digits) - 1) ];

      $hash .= $symbol.$digit;
    }

    return $hash;
  }
}