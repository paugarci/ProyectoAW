<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\QuestionDTO;

class QuestionDAO extends DAO
{

    private const TABLE_NAME = 'foro_preguntas';
    private const ID_KEY = 'id';
    private const PREGUNTA_KEY = 'pregunta';
    private const FECHA_KEY = 'fecha';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    //  Methods

    protected function createDTOFromArray($array): DTO
    {
        $id = $array[self::ID_KEY];
        $pregunta = $array[self::PREGUNTA_KEY];
        $fecha = $array[self::FECHA_KEY];

        return new QuestionDTO($id, $pregunta, $fecha);
    }
    protected function createArrayFromDTO($dto): array
    {
        return array(
            self::ID_KEY => $dto->getID(),
            self::PREGUNTA_KEY => $dto->getPregunta(),
            self::FECHA_KEY => $dto->getFecha()
        );
    }
}