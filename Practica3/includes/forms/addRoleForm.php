<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\RoleDAO;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

class AddRoleForm extends Form
{
    //  Constants
    private const FORM_ID = 'change-role_form';
    private const URL_REDIRECTION = 'forum.php';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
        echo 'TODO';
        die;
    }
    protected function generateFormFields($data)
    {
        $errorsHTML = '';

        if (count($this->m_Errors) > 0) {
            foreach ($this->m_Errors as $error) {
                $errorsHTML .= <<<HTML_ERROR
                <div class="alert alert-danger m-2 justify-content-center align-center" role="alert">
                    <b>Error:</b> {$error}
                </div>
                HTML_ERROR;
            }
        }

        $userDAO = new UserDAO;
        $users = $userDAO->read();

        $usersHTML = '';
        foreach ($users as $user) {
            $userName = $user->getName() . " " . $user->getSurname() . " - (" . $user->getEmail() . ")";
            $usersHTML .= <<<HTML_USERS
                <option value="{$user->getID()}">{$userName}</option>
            HTML_USERS;
        }

        $roleDAO = new RoleDAO;
        $roles = $roleDAO->read();

        $rolesHTML = '';
        foreach ($roles as $role) {
            $rolesHTML .= <<<HTML_ROLES
                <option value="{$role->getID()}">{$role->getRoleName()}</option>
            HTML_ROLES;
        }

        return <<<HTML_FORM
        <div class="row">
            <div class="col-12 my-2">
                <label for="name" class="form-label">Usuario</label>
                <select class="form-select" aria-label=".form-select-lg example">
                    <option selected>Seleccione un usuario</option>
                    {$usersHTML}
                </select>
            </div>
            <div class="col-12 my-2">
                <label for="name" class="form-label">Rol</label>
                <select class="form-select" aria-label=".form-select-lg example">
                    <option selected>Seleccione un rol</option>
                    {$rolesHTML}
                </select>
            </div>
        </div>
        <div class="row my-4">
            <div class="col m-1">
                <button class="btn btn-primary btn-lg w-100" type="submit" name="addRole">Añadir rol</button>
            </div>
            <div class="col m-1">
                <button class="btn btn-danger btn-lg w-100" type="submit" name="deleteRole">Eliminar rol</button>
            </div>
        </div>
        HTML_FORM;
    }
}
