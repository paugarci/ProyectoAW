<?php
include 'DAO.php';
class UserDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct("products", $connection);
  }
}
?>