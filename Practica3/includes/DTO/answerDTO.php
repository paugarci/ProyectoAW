<?php

namespace es\ucm\fdi\aw\DTO;

require_once 'includes/config.php';

class AnswerDTO extends DTO
{
    private $m_ID;
    private $m_IDPregunta;
    private $m_Respuesta;
    private $m_Fecha;

    public function __construct($id, $idpregunta, $respuesta,  $fecha)
    {
        $this->m_ID = $id;
        $this->m_IDPregunta = $idpregunta;
        $this->m_Respuesta = $respuesta;
        $this->m_Fecha = $fecha;
    }
    public function getID()
    {
        return $this->m_ID;
    }
    
    public function getIDPregunta()
    {
        return $this->m_IDPregunta;
    }
    
    public function getRespuesta()
    {
        return $this->m_Respuesta;
    }

    public function getFecha()
    {
        return $this->m_Fecha;
    }
   
        
}