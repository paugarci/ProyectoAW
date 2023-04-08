<?php

namespace es\ucm\fdi\aw\forms;

require_once 'includes/config.php';

class ContactForm extends Form
{
    //  Constants
    private const FORM_ID = 'contact_form';
    private const URL_REDIRECTION = 'index.php';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
        $mailSent = mail("zeus-airsoft@gmail.com", $_POST["contactReason"], $_POST["message"]);

        if (!$mailSent) {
            $this->m_Errors['unknown'] = 'An unknown error has ocurred.';
            return;
        }
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
        <div class="row p-4 g-3">
            <h2 class="d-flex justify-content-center">Contacta con nosotros</h2>

            <hr class="my-4">

            {$errorsHTML}

            <div class="col-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Lorem" required>
                <div class="invalid-feedback">
                Por favor, rellene los campos obligatorios.
                </div>
            </div>

            <div class="col-6">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Ipsum" required>
                <div class="invalid-feedback">
                Por favor, rellene los campos obligatorios.
                </div>
            </div>

            <div class="col-12">
                <label for="mail" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="mail" placeholder="usuario@dominio.ext" required>
                <div class="invalid-feedback">
                Por favor, introduzca una dirección de correo electrónico válida.
                </div>
            </div>

            <div class="row g-3 m-2 d-flex justify-content-center">
                <div class="form-check col-4">
                <input id="evaluacion" name="contactReason" type="radio" class="form-check-input" checked="" required>
                <label class="form-check-label" for="evaluacion">Evaluación</label>
                </div>
                <div class="form-check col-4">
                <input id="sugerencias" name="contactReason" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="sugerencias">Sugerencias</label>
                </div>
                <div class="form-check col-4">
                <input id="criticas" name="contactReason" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="criticas">Críticas</label>
                </div>
            </div>

            <div class="form-group">
                <label for="textBox" class="form-label">Motivo de su consulta</label>
                <textarea class="form-control" id="textBox" rows="5" name="message"></textarea>
            </div>

            <div class="form-check col-md-8">
                <input type="checkbox" class="form-check-input" id="same-address">
                <label class="form-check-label" for="same-address">Marque esta casilla para verificar que ha leído nuestros <a
                    href="info.php#condiciones">términos y condiciones</a> de uso.</label>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
        </div>
        HTML_FORM;
    }
}
