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

  public function deleteById($id)
  {
    $this->delete('id', $id);
  }

  public function getById($id)
  {
    $this->get('id', $id);
  }

  public function updateQ($id, $column, $value)
{
    $this->updateOnce('id', $id, $column, $value);
}

  
  

}
?>

