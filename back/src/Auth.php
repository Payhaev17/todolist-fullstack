<?php

namespace App;

class Auth {
  private \App\Sys\Connection $Connection;
  private \App\Sys\Validator $Validator;
  private \App\Sys\RequestBodyReader $RequestBodyReader;
  private \App\Sys\Messenger $Messenger;
  private \App\Sys\RandomStr $RandomStr;

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
    switch($_GET["t"]) {
      case "signup":
        $this->signUp();
        break;
      case "signin":
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
      http_response_code(401);
      
      $this->Messenger->sendResponse(["error" => "Логин занят!"]);
    }

    # Invalid data
    if (!($this->Validator->loginValid($login) && $this->Validator->passwordValid($password))) {
      http_response_code(401);

      $this->Messenger->sendResponse(["error" => "Введите корректные данные!"]);
    }

    # Signup
    $sessionHash = $this->RandomStr->sessionHash();

    $this->Connection->query("INSERT INTO users (login, password, session_hash, date) VALUES (?, ?, ?, ?)", array(
      $login, password_hash($password, PASSWORD_DEFAULT), $sessionHash, time()
    ));
    
    $userId = $this->Connection->lastId();

    http_response_code(200);

    $this->Messenger->sendResponse([
      "auth" => true,
      "id" => $userId,
      "hash" => $sessionHash
    ]);
  }

  public function signIn() :void {
    $body = $this->RequestBodyReader->getBody();

    $login = isset($body["login"]) ? $body["login"] : "";
    $password = isset($body["password"]) ? $body["password"] : "";
    
    $user = $this->Connection->fetch("SELECT id, password FROM users WHERE login = ?", array($login));

    if (!$user || !password_verify($password, $user["password"])) {
      http_response_code(401);

      $this->Messenger->sendResponse([
        "error" => "Логин или пароль введены не верно!"
      ]);
    }

    $sessionHash = $this->RandomStr->sessionHash();
      
    $this->Connection->query("UPDATE users SET session_hash = ? WHERE id = ?", array(
      $sessionHash, $user["id"]
    ));

    http_response_code(200);

    $this->Messenger->sendResponse([
      "auth" => true,
      "id" => $user["id"],
      "hash" => $sessionHash
    ]);
  }
}