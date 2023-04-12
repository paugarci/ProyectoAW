<?php

namespace es\ucm\fdi\aw\DTO;

require_once 'includes/config.php';

class UsersProductsDTO extends DTO
{
    //  Fields
    private $m_UserID;
    private $m_ProductID;
    private $m_Amount;

    //  Constructors
    public function __construct($userID, $productID, $amount)
    {
        $this->m_UserID = $userID;
        $this->m_ProductID = $productID;
        $this->m_Amount = $amount;
    }

    //  Methods
    public function getID1()
    {
        return $this->m_UserID;
    }
    
    public function getID2()
    {
        return $this->m_ProductID;
    }

    public function getAmount()
    {
        return $this->m_Amount;
    }

    public function setAmount($amount)
    {
        $this->m_Amount = $amount;
    }
}
