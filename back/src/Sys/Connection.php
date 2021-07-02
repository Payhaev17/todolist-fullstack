<?php

namespace App\Sys;

class Connection {
  private \PDO $db;

  public function __construct(string $host, string $dbname, string $username, string $password)
  {
    try {
      $this->db = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (\PDOException $e) {
      exit(http_response_code(500));
    }
  }

  public function query(string $query, array $args = []) :mixed
  {
    try {
      $statement = $this->db->prepare($query);
      $statement->execute($args);
    } catch (\PDOException $e) {
      throw $e;
    }

    return $statement;
  }

  public function rows(string $query, array $args = []) :mixed
  {
    return $this->query($query, $args)->rowCount();
  }

  public function fetch(string $query, array $args = []) :array
  {
    $stmt = $this->query($query, $args);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function fetchAll(string $query, array $args = []) :array
  {
    $stmt = $this->query($query, $args);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function noPrepared(string $query)
  {
    return $this->db->query($query);
  }

  public function quote(string $var)
  {
    return $this->db->quote($var);
  }

  public function lastId() :mixed
  {
    return $this->db->lastInsertId();
  }

  public function offEmulate()
  {
    $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
  }

  public function onEmulate()
  {
    $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
  }
}