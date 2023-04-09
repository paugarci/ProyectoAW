<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

class DeleteEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'delete_event_form';
    private const URL_REDIRECTION = 'allEvents.php';

    //  Fields
    private $m_EventID;

    //  Constructors
    public function __construct($eventID)
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));

        $this->m_EventID = $eventID;
    }

    //  Methods
    protected function processForm($data)
    {
        switch ($data['action']) {
            case 'delete': {
                    $eventDAO = new EventDAO();
                    $eventDAO->delete($this->m_EventID);
                }
                break;
            case 'cancel':
            default: {
                $this->m_URLRedirection = "readEvent.php?eventID={$this->m_EventID}";    
            }
                break;
        }
    }
    protected function generateFormFields($data)
    {
        $eventDAO = new EventDAO();
        $eventDTO = $eventDAO->read($this->m_EventID)[0];
        $eventName = $eventDTO->getName();

        return <<<HTML
        <p>¿Estás seguro de que quieres borrar el evento <i>$eventName<i>?</p>
        <div class="d-flex flex-row">
            <button class="btn btn-primary mx-1" name="action" value="cancel">Cancelar</button>
            <button class="btn btn-outline-danger mx-1" name="action" value="delete">Eliminar</button>
        </div>
        HTML;
    }
}
