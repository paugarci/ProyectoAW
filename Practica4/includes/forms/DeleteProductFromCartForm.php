<?php

namespace es\ucm\fdi\aw\forms;

use es\ucm\fdi\aw\DAO\UserDAO;
use es\ucm\fdi\aw\DAO\UserProductDAO;

require_once 'includes/config.php';

class DeleteProductFromCartForm extends Form
{
    //  Constants
    private const FORM_ID = 'del_prod';
    private const URL_REDIRECTION = 'shoppingCart.php';

    //  Fields
    private $m_ProductID;

    //  Constructors
    public function __construct($m_ProductID)
    {
        parent::__construct(self::FORM_ID, array(parent::URL_REDIRECTION_KEY => self::URL_REDIRECTION));
        
        $this->m_ProductID = $m_ProductID;
    }

    //  Methods
    protected function processForm($data)
    {
        echo "<pre>";
        $cart = new UserProductDAO();
        $result = false;
        if ( isset($_SESSION['user'])){
            $userID = $_SESSION['user']->getID();
            
            $result = $cart->deleteProduct($userID, $data['m_ProductID']);
        }else{
            $i=0;
            $clave=0;
            foreach($_SESSION["carritoTemporal"] as $prod){
                if ($prod->getID2() == $data['m_ProductID'])
                    $clave = $i;
                
                $i++;
            }
            unset($_SESSION["carritoTemporal"][$clave]);
            $_SESSION["carritoTemporal"] = array_values($_SESSION["carritoTemporal"]);
            $result = true;
        }
        
        if (!$result)
            $this->m_Errors['bad_abandon_event'] = 'No se ha podido elminiar el producto.';
    }

    protected function generateFormFields($data)
    {
        
       $m_ProductID =  $this->m_ProductID;
        return <<<HTML
         <button type="submit" class="btn btn-danger"name="m_ProductID" value="$m_ProductID" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
            </svg>
        </button>
        HTML;
    }
}
