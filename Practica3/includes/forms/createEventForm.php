<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\EventDAO;
use es\ucm\fdi\aw\DTO\EventDTO;

require_once 'includes/config.php';

class CreateEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'create_event_form';
    private const URL_REDIRECTION = 'readEvent.php';

    //  Fields
    private $m_EventID;

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
        if (!isset($data['eventName']) || empty($data['eventName']))
            $this->m_Errors['empty_name'] = 'El nombre del evento no puede estar vacío.';
        if (!isset($data['eventDescription']) || empty($data['eventDescription']))
            $this->m_Errors['empty_description'] = 'La descripción del evento no puede estar vacía.';
        if (!isset($data['eventDate']) || empty($data['eventDate']))
            $this->m_Errors['empty_date'] = 'La fecha del evento no puede estar vacía.';

        if (count($this->m_Errors) > 0)
            return;

        $eventName = $data['eventName'];
        $eventDescription = $data['eventDescription'];
        $eventDate = $data['eventDate'];

        $eventDAO = new EventDAO();
        $eventDTO = new EventDTO(-1, $eventName, $eventDescription, $eventDate);

        if (!$eventDAO->create($eventDTO)) {
            $this->m_Errors['bad_create'] = 'Ha ocurrido un error inesperado al crear el evento.';
            return;
        }

        $eventDTO = $eventDAO->read(
            null,
            [
                'name' => $eventName,
                'description' => $eventDescription
            ]
        )[0];

        $this->m_EventID = $eventDTO->getID();
        
        $this->m_URLRedirection = "readEvent.php?eventID={$this->m_EventID}";
    }
    protected function generateFormFields($data)
    {
        $eventName = isset($data['eventName']) ? $data['eventName'] : '';
        $eventDescription = isset($data['eventDescription']) ? $data['eventDescription'] : '';
        $eventDate = isset($data['eventDate']) ? $data['eventDate'] : '';

        $errorBadCreate = (!isset($this->m_Errors['bad_create'])) ? '' : <<<HTML
        <div class="alert alert-warning my-1">
            {$this->m_Errors['bad_create']}
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
        $errorEmptyDate = (!isset($this->m_Errors['empty_date'])) ? '' : <<<HTML
        <div class="alert alert-warning my-1">
            {$this->m_Errors['empty_date']}
        </div>
        HTML;

        return <<<HTML
        $errorBadCreate
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
        <div class="form-group">
            <label for="eventDate">Fecha</label>
            <input type="date" id="eventDate" class="form-control" name="eventDate" value="$eventDate">
            $errorEmptyDate
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Confirmar</button>
        HTML;
    }
}
