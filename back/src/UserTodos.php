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
      case "PATCH":
        $this->changeTodo();
        break;
    }
  }

  private function getUserTodos() :void {
    if (!$this->User->isAuth()) {
      $this->Messenger->sendResponse(401, "Unauthorized");
    }
  
    $this->Messenger->sendResponse(200, 
      $this->Connection->fetchAll("SELECT * FROM todos WHERE user_id = ?", array($this->User->getId()))
    );
  }

  private function addTodo() :void {

  }

  private function deleteTodo() :void {

  }

  private function changeTodo() :void {
    if (!$this->User->isAuth()) {
      $this->Messenger->sendResponse(401, "Unauthorized");
    }

    $body = $this->RequestBodyReader->getBody();
    $id = intval((isset($_GET["id"])) ? $_GET["id"] : 0);

    if (!isset($body["key"]) && !isset($body["to"])) {
      return;
    }

    switch($body["key"]) {
      case "title":
        // $this->changeTodoTitle();
        break;
      case "text":
        // $this->changeTodoText();
        break;
      case "complete":
        $this->changeTodoComplete($id);
        break;
    }
  }

  public function changeTodoComplete(int $id) :void {
    if ($todo = $this->Connection->fetch("SELECT * FROM todos WHERE id = ?", array($id))) {
      if ($todo["complete"] || $todo["user_id"] != $this->User->getId()) {
        return;
      }

      $this->Connection->query("UPDATE todos SET complete = ? WHERE id = ?", array(1, $id));

      $this->Messenger->sendResponse(200, [
        "id" => $todo["id"],
        "title" => $todo["title"],
        "text" => $todo["text"],
        "complete" => 1,
        "del" => 0,
        "date" => $todo["date"]
      ]);
    }
  }
}