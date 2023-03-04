<?php
class DAO {
  private $table;
  private $db;

  public function __construct($table, PDO $connection)
  {
    $this->table = $table;
    $this->db = $connection;
  }

  public function getAll ()
  {
    $statement = $this->db->prepare("SELECT * FROM {$this->table}");
    $statement->execute();

    return $statement->fetchAll();
  }

  public function get ($key, $info)
  {
    $statement = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$key} = :{$key} LIMIT 1");
    $statement->bindParam(":{$key}", $info);

    $statement->execute();

    return $statement->fetchAll();
  }

  public function insert ($data)
  {
    $query = "INSERT INTO {$this->table} (";

    foreach ($data as $field => $info)
    {
      $query .= "{$field},";
    }
    $query = trim($query, ',');
    $query .= ") infoS (";

    foreach ($data as $field => $info)
    {
      $query .= "':{$field}',";
    }
    $query = trim($query, ',');
    $query .= ");";
    $statement = $this->db->prepare($query);

    foreach ($data as $field => $info)
    {
      $statement->bindParam(":{$field}", $info);
    }

    $statement->execute();
  }

  public function update ($key, $info, $data)
  {
    $query = "UPDATE {$this->table} SET ";
    foreach ($data as $field => $info)
    {
      $query .= "{$field} = :{$field},";
    }
    $query = trim($query, ',');
    $query .= " WHERE {$key} = :{$key}";
    $statement = $this->db->prepare($query);

    foreach ($data as $field => $info)
    {
      $statement->bindParam(":{$field}", $info);
    }
    $statement->bindParam(":{$key}", $info);
    $statement->execute();
  }

  public function delete ($key, $info)
  {
    $statement = $this->db->prepare("DELETE FROM {$this->table} WHERE {$key} = :{$key}");
    $statement->bindParam(":{$key}", $info);
    $statement->execute();
  }
}
?>