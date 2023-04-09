<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

class UpdateEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'update_event_form';
    private const URL_REDIRECTION = 'readEvent.php';

    //  Fields
    private $m_EventID;

    //  Constructors
    public function __construct($eventID)
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION."?eventID=$eventID"));

        $this->m_EventID = $eventID;
    }

    //  Methods
    protected function processForm($data)
    {
        if (!isset($data['eventName']) || empty($data['eventName']))
            $this->m_Errors['empty_name'] = 'El nombre del evento no puede estar vacío.';
        if (!isset($data['eventDescription']) || empty($data['eventDescription']))
            $this->m_Errors['empty_description'] = 'La descripción del evento no puede estar vacía.';

        if (count($this->m_Errors) > 0)
            return;

        $eventName = $data['eventName'];
        $eventDescription = $data['eventDescription'];

        switch ($data['action']) {
            case 'confirm': {
                    $eventDAO = new EventDAO();
                    $eventDTO = $eventDAO->read($this->m_EventID)[0];

                    $eventDTO->setName($eventName);
                    $eventDTO->setDescription($eventDescription);

                    if (!$eventDAO->update($eventDTO))
                        $this->m_Errors['bad_update'] = 'Ha ocurrido un error inesperado al actualizar el evento.';
                }
                break;
            default:
                break;
        }
    }
    protected function generateFormFields($data)
    {
        $eventDAO = new EventDAO();
        $eventID = $this->m_EventID;
        $eventDTO = $eventDAO->read($eventID)[0];
        $players = $eventDAO->getPlayersForEvent($eventDTO->getID());

        $eventName = $eventDTO->getName();
        $eventDescription = $eventDTO->getDescription();
        $playersList = <<<HTML
        <div class="alert alert-info">
            No hay jugadores para este evento
        </div>
        HTML;

        if (count($players) > 0) {
            $playersList = '';

            foreach ($players as $player) {
                $playersList .= <<<HTML
                <div class="list-group-item">
                    {$player['name']}
                </div>
                HTML;
            }
        }

        $errorBadUpdate = (!isset($this->m_Errors['bad_update'])) ? '' : <<<HTML
        <div class="alert alert-warning my-1">
            {$this->m_Errors['bad_update']}
        </div>
        HTML;
        $errorEmptyName = (!isset($this->m_Errors['empty_name'])) ? '' : <<<HTML
        <div class="alert alert-warning my-1">
            {$this->m_Errors['empty_name']}
        </div>
        HTML;
        $errorEmptyDescription = (!isset($this->m_Errors['empty_description'])) ? '' : <<<HTML
        <div class="alert alert-warning my-1">
            {$this->m_Errors['empty_description']}
        </div>
        HTML;

        return <<<HTML
        $errorBadUpdate
        <div class="form-group">
            <label for="eventName">Nombre</label>
            <input type="text" id="eventName" class="form-control" name="eventName" value="$eventName">
            $errorEmptyName
        </div>
        <br>
        <div class="form-group">
            <label for="eventDescription">Descripción</label>
            <textarea id="eventDescription" class="form-control" rows='5' name="eventDescription">$eventDescription</textarea>
            $errorEmptyDescription
        </div>
        <br>
        <label for="players">Jugadores</label>
        <ul class="list-group" id="players">
            $playersList
        </ul>
        <br>
        <button type="submit" class="btn btn-primary" name="action" value="confirm">Confirmar</button>
        <button type="submit" class="btn btn-outline-primary" name="action" value="cancel">Cancelar</button>
        HTML;
    }
}
