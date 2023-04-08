<?php

namespace es\ucm\fdi\aw\forms;

require_once 'includes/config.php';

class AddProductForm extends Form
{
    //  Constants
    private const FORM_ID = 'add-product_form';
    private const URL_REDIRECTION = 'products.php';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
    }

    //  Methods
    protected function processForm($data)
    {
        $target_dir = IMAGES_ROOT . "/products/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $isImage = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if (!$isImage)
            $this->m_Errors['file_not_image'] = "Este archivo no es una imagen";

        if ($imageFileType != "jpg" || $imageFileType != "jpeg" || $imageFileType != "png")
            $this->m_Errors['incorrect_image_format'] = "Esta imagen no tiene una extensión válida";


        if (file_exists($target_file))
            $this->m_Errors['iamge_already_exists'] = "Esta imagen ya se ha subido antes, pruebe con otra por favor";

        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            $this->m_Errors['unknown_error'] = "Ha ocurrido un error inesperado al subir la imagen";

        if (count($this->m_Errors) > 0)
            return;

        
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
        <div class="container shadow">
        <div class="row m-3 p-4">
            <div class="col-12 my-1">
                <label for="name" class="form-label align-middle me-2">Nombre del producto</label>
                <input type="text" class="form-control" name="name" required>
                <div class="invalid-feedback">
                    Por favor, rellene los campos obligatorios.
                </div>
            </div>
            <div class="col-12 my-1">
                <label for="price" class="form-label align-middle me-2">Precio del producto</label>
                <input type="text" class="form-control" name="price" required>
                <div class="invalid-feedback">
                    Por favor, rellene los campos obligatorios.
                </div>
            </div>
            <div class="form-group my-1">
                <label for="textBox" class="form-label">Descripción del producto</label>
                <textarea class="form-control" style="resize: none;" rows="10" name="description"></textarea>
            </div>
            <div class="col-12 my-3">
                Imagen del producto:<br>
                <input class="card mt-2 p-2" type="file" name="fileToUpload">
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-3">Añadir</button>
        </div>
        HTML_FORM;
    }
}
