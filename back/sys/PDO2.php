<?php

namespace App;

class PDO2 {
  public static $db;

  public static function query($query, $args = [])
  {
    try
    {
      $statement = PDO2::$db->prepare($query);
      $statement->execute($args);
    } catch (\PDOException $e)
    {
      throw $e;
    }
    return $statement;
  }

  public static function rows($query, $args = [])
  {
    return PDO2::query($query, $args)->rowCount();
  }

  public static function fetch($query, $args = [])
  {
    $stmt = PDO2::query($query, $args);
    return $data = $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public static function fetchAll($query, $args = [])
  {
    $stmt = PDO2::query($query, $args);
    return $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public static function noPrepared($query)
  {
    return PDO2::$db->query( $query );
  }

  public static function quote($var)
  {
    return $var = PDO2::$db->quote($var);
  }

  public static function last()
  {
    return PDO2::$db->lastInsertId();
  }

  public static function offEmulate()
  {
    PDO2::$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
  }

  public static function Emulate($param)
  {
    return PDO2::onEmulate($param);
  }

  public static function onEmulate($param)
  {
    PDO2::$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, $param);
  }
}