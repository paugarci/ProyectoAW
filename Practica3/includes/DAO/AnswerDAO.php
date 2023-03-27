<?php
namespace es\ucm\fdi\aw\DAO;
class AnswerDAO extends DAO
{
  public function __construct($connection)
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