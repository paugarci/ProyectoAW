<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\EventDAO;

require_once 'includes/config.php';

class AbandonEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'abandon_event_form';
    private const URL_REDIRECTION = 'myEvents.php';

    //  Fields
    private $m_EventID;

    //  Constructors
    public function __construct($eventID, $inline = false)
    {
        parent::__construct(
            self::FORM_ID,
            [
                parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION,
                parent::CLASS_ATTRIBUTE_KEY => ($inline ? 'd-inline' : '')
            ]
        );

        $this->m_EventID = $eventID;
    }

    //  Methods
    protected function processForm($data)
    {
        if (!isset($_SESSION['user']))
            $this->m_Errors['no_user_logged_in'] = 'Debes iniciar sesión para abandonar un evento.';

        if (count($this->m_Errors) > 0)
            return;

        $eventDAO = new EventDAO();

        $userID = $_SESSION['user']->getID();

        $result = $eventDAO->abandonEvent($userID, $this->m_EventID);

        if (!$result)
            $this->m_Errors['bad_abandon_event'] = 'No se ha podido abandonar el evento.';
    }
    protected function generateFormFields($data)
    {
        return <<<HTML
            <button type="submit" class="btn btn-outline-danger" name="eventID" value="{$this->m_EventID}">Abandonar</button>
        HTML;
    }
}
