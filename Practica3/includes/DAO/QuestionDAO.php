<?php
namespace es\ucm\fdi\aw\DAO;
class QuestionDAO extends DAO
{
  public function __construct($connection)
  {
    parent::__construct("foro_preguntas", $connection);
  }

  public function create($data)
  {
    $this->insert($data);
  }

  public function deleteById($id)
  {
    $this->delete('id', $id);
  }

  

}
?>