<?php
class AnswerDAO extends DAO
{
  public function __construct(PDO $connection)
  {
    parent::__construct("foro_respuestas", $connection);
  }

  public function create($data)
  {
    $this->insert($data);
  }

  public function deleteById($id)
  {
    $this->delete('id_pregunta', $id);
  }
}

?>