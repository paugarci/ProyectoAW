<?php
class UserDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct("users", $connection);
  }
}
?>