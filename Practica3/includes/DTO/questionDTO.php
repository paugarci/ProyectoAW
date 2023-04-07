<?php

namespace es\ucm\fdi\aw\DTO;

require_once 'includes/config.php';

class QuestionDTO extends DTO
{
    private $m_ID;
    private $m_Pregunta;
    private $m_Fecha;

    public function __construct($id, $pregunta, $fecha)
    {
        $this->m_ID = $id;
        $this->m_Pregunta = $pregunta;
        $this->m_Fecha = $fecha;
    }
    public function getID()
    {
        return $this->m_ID;
    }
    
    public function getPregunta()
    {
        return $this->m_Pregunta;
    }
    
    public function getFecha()
    {
        return $this->m_Fecha;
    }
   
    public function setPregunta($pregunta)
    {
        $this->m_Pregunta = $pregunta;
    }
    
}