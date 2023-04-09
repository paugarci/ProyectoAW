<?php

namespace es\ucm\fdi\aw\forms;

require_once 'includes/config.php';

class DeleteEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'delete_event_form';
    private const URL_REDIRECTION = 'index.php';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
    }
    protected function generateFormFields($data)
    {
        return <<<HTML
            <button class="btn btn-outline-danger">Eliminar</button>
        HTML;
    }
}
