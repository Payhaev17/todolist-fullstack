<?php

namespace App;

class Auth {
  private \App\Sys\Connection $Connection;
  private \App\Sys\Validator $Validator;
  private \App\Sys\RequestBodyReader $RequestBodyReader;
  private \App\Sys\Messenger $Messenger;

  public function __construct(
    \App\Sys\Connection $Connection, 
    \App\Sys\Validator $Validator, 
    \App\Sys\RequestBodyReader $RequestBodyReader, 
    \App\Sys\Messenger $Messenger,
    \App\Sys\RandomStr $RandomStr)
  {
    $this->Connection = $Connection;
    $this->Validator = $Validator;
    $this->RequestBodyReader = $RequestBodyReader;
    $this->Messenger = $Messenger;
    $this->RandomStr = $RandomStr;
  }

  public function auth() :void {
    switch($_SERVER["REQUEST_METHOD"]) {
      case "POST":
        $this->signUp();
        break;
      case "GET":
        $this->signIn();
        break;
    }
  }

  public function signUp() :void {
    $body = $this->RequestBodyReader->getBody();

    $login = trim(htmlspecialchars( (isset($body["login"]) ? $body["login"] : "") ));
    $password = trim(htmlspecialchars( (isset($body["password"]) ? $body["password"] : "") ));

    $loginIsOccupy = $this->Connection->rows("SELECT id FROM users WHERE login = ?", array($login));

    # Login ocuppied
    if ($loginIsOccupy) {
      $this->Messenger->sendResponse(400, [
        "error" => "Логин занят!"
      ]);
    }

    # Invalid data
    if (!($this->Validator->loginValid($login) && $this->Validator->passwordValid($password))) {
      $this->Messenger->sendResponse(400, [
        "error" => "Введите корректные данные!"
      ]);
    }

    # Signup
    $sessionHash = $this->RandomStr->sessionHash();

    // $this->Connection->query("INSERT INTO users (login, password, session_hash, date) VALUES (?, ?, ?, ?)", array(
    //   $login, password_hash($password, PASSWORD_DEFAULT), $sessionHash, time()
    // ));
    
    $userId = $this->Connection->lastId();

    $this->Messenger->sendResponse(201, [
      "auth" => true,
      "id" => $userId,
      "hash" => $sessionHash
    ]);
  }

  public function signIn() :void {
    return;
  }
}