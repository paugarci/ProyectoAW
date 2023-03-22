<?php
class QuestionDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct("foro_preguntas", $connection);
  }

  public function create($data)
  {
    $this->insert($data);
  }
}
?>

