<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\OrderDAO;

require_once 'includes/config.php';

class UpdateAddressForm extends Form
{
    //  Constants
    private const FORM_ID = 'update_address_form';
    private const URL_REDIRECTION = 'viewOrder.php';

    //  Fields
    private $m_OrderID;

    //  Constructors
    public function __construct($orderID, $inline = false)
    {
        parent::__construct(
            self::FORM_ID,
            [
                parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION,
                parent::CLASS_ATTRIBUTE_KEY => ($inline ? 'd-inline' : '')
            ]
        );

        $this->m_OrderID = $orderID;
    }

    //  Methods
    protected function processForm($data)
    {

        if (count($this->m_Errors) > 0)
            return;

        $orderDAO = new OrderDAO();

        $userID = $_SESSION['user']->getID();

        $result = $orderDAO->updateOrder($userID, $this->m_OrderID);

        if (!$result)
            $this->m_Errors['bad_update_order'] = 'No se ha podido modificar la dirección.';
    }
    protected function generateFormFields($data)
    {
        return <<<HTML
            <button type="submit" class="btn btn-outline-danger" name="orderID" value="{$this->m_OrderID}">Editar</button>
        HTML;
    }
}