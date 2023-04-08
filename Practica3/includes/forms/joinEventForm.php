<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\EventDAO;
use es\ucm\fdi\aw\DAO\EventRolesDAO;

require_once 'includes/config.php';

class JoinEventForm extends Form
{
    //  Constants
    private const FORM_ID = 'join_event_form';
    private const URL_REDIRECTION = 'myEvents.php';

    //  Fields
    private $m_EventID;

    //  Constructors
    public function __construct($eventID)
    {
        parent::__construct(self::FORM_ID, [parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION]);

        $this->m_EventID = $eventID;
    }

    //  Methods
    protected function processForm($data)
    {
        if (!isset($_SESSION['user']))
            $this->m_Errors['no_user_logged_in'] = 'Debes iniciar sesión para unirte a un evento.';

        if (!isset($data['eventRoleID']) || empty($data['eventRoleID']))
            $this->m_Errors['empty_role'] = 'El rol no puede estar vacío.';

        if (count($this->m_Errors) > 0)
            return;

        $eventDAO = new EventDAO();
        $eventRolesDAO = new EventRolesDAO();

        $userID = $_SESSION['user']->getID();
        $eventRoleID = $data['eventRoleID'];

        $maximumsPerRole = $eventRolesDAO->getMaximumsPerRole();
        $roleCount = $eventDAO->getCountByRoleID($this->m_EventID, $eventRoleID);

        if ($roleCount >= $maximumsPerRole[$eventRoleID]) {
            $this->m_Errors['maximum_per_role_reached'] = 'No quedan plazas disponibles para este rol.';
            return;
        }

        $result = $eventDAO->joinEvent($userID, $this->m_EventID, $eventRoleID);

        if (!$result)
            $this->m_Errors['bad_join'] = 'No se ha podido unirse al evento.';
    }
    protected function generateFormFields($data)
    {
        $eventRolesDAO = new EventRolesDAO();
        $roles = $eventRolesDAO->getRolesName();
        $options = '';

        foreach ($roles as $roleID => $roleName)
            $options .= "<option value=\"$roleID\">$roleName</option>";

        $errors = '';

        if (count($this->m_Errors) > 0) {
            $errors = '<div class="alert alert-warning">';

            foreach ($this->m_Errors as $error)
                $errors .= $error;
            
            $errors .= '</div>';
        }

        return <<<HTML
        $errors
        <div class="form-group">
            <label for="eventRole">Rol</label>
            <select name="eventRoleID" id="eventRole" class="form-select">
                $options
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-primary" name="eventID" value="$this->m_EventID">Unirse</button>
        <?php endif; ?>
        HTML;
    }
}
