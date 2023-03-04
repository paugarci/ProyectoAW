<?php
class StateDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct('states', $connection);
  }
}
?>