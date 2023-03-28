<?php
namespace es\ucm\fdi\aw\DAO;
class StateDAO extends DAO
{
  public function __construct($connection)
  {
    parent::__construct("states", $connection);
  }
}
?>