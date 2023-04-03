<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\Application;
use es\ucm\fdi\aw\DAO\UserDAO;

require_once 'includes/config.php';

class LoginForm extends Form
{
    //  Constants
    private const FORM_ID = 'login_form';
    private const URL_REDIRECTION = 'index.php';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
        if (!isset($data['email']) || empty($data['email']))
            $this->m_Errors['empty_email'] = 'El email no puede estar vacío.';

        if (!isset($data['password']) || empty($data['password'])) 
            $this->m_Errors['empty_password'] = 'La contraseña no puede estar vacía.';

        if (count($this->m_Errors) > 0)
            return;

        $email = $data['email'];
        $password = filter_var($data['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $userDAO = new UserDAO();
        $userDTOArray = $userDAO->read(null, ['email' => $email]);
        $numFetchedUsers = count($userDTOArray);

        if ($numFetchedUsers == 0) {
            $this->m_Errors['unknown_email'] = 'Email desconocida.';
            return;
        } else if ($numFetchedUsers > 1) {
            error_log('Warning: reading multiple DTOs from DAO when only one is expected for login operation.');
            $this->m_Errors['unknown'] = 'An unknown error has ocurred.';
            return;
        }

        $userDTO = $userDTOArray[0];

        if (!password_verify($password, $userDTO->getPasswordHash())) {
            $this->m_Errors['wrong_email_or_password'] = 'Email o contraseña incorrecta';
            return;
        }

        Application::getInstance()->loginUser($userDTO);
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

        return <<<HTML_FORM
        <div class="p-4">
            <h2 class="mb-3 d-flex justify-content-center">Iniciar sesión</h2>

            <hr class="my-4">

            {$errorsHTML}

            <div class="col-sm-12">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" placeholder="usuario@dominio.ext" required>
                <div class="invalid-feedback">
                    Por favor, introduzca una dirección de correo electrónico válida.
                </div>
            </div>

            <div class="col-sm-12">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="********" required>
                <div class="invalid-feedback">
                    Por favor, rellene los campos obligatorios.
                </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Entrar</button>
        </div>
        HTML_FORM;
    }
}
