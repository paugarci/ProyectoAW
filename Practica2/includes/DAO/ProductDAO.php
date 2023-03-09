<?php
class ProductDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct("products", $connection);
  }
}
?>