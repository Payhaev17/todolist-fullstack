<?php

namespace App;

class UserTodos {
  private \App\Sys\Connection $Connection;
  private \App\Sys\Validator $Validator;
  private \App\Sys\RequestBodyReader $RequestBodyReader;
  private \App\Sys\Messenger $Messenger;

  private \App\Sys\User $User;

  public function __construct(
    \App\Sys\Connection $Connection, 
    \App\Sys\Validator $Validator, 
    \App\Sys\RequestBodyReader $RequestBodyReader, 
    \App\Sys\Messenger $Messenger,
    \App\Sys\User $User
  )
  {
    $this->Connection = $Connection;
    $this->Validator = $Validator;
    $this->RequestBodyReader = $RequestBodyReader;
    $this->Messenger = $Messenger;
    $this->User = $User;
  }

  public function handleRequest() :void {
    switch($_SERVER["REQUEST_METHOD"]) {
      case "GET":
        $this->getUserTodos();
        break;
      case "POST":
        $this->addTodo();
        break;
      case "DELETE":
        $this->deleteTodo();
        break;
    }
  }

  private function getUserTodos() {
    if (!$this->User->isAuth()) {
      $this->Messenger->sendResponse(401, "Unauthorized");
    }
  
    $this->Messenger->sendResponse(200, 
      $this->Connection->fetchAll("SELECT * FROM todos WHERE user_id = ?", array($this->User->getId()))
    );
  }

  private function addTodo() {

  }

  private function deleteTodo() {

  }
}