<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\UserProductDTO;

class UserProductDAO extends DAO
{
    private const TABLE_NAME = 'users_products';
    private const ID_KEY1 = 'userID';
    private const ID_KEY2 = 'productID';
    private const AMOUNT_KEY = 'amount';

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    public function getUserCart($userID): array
    {
        $query = "SELECT * FROM users_products WHERE userID = :userID";
        $statement = $this->m_DatabaseProxy->prepare($query);
        
        $statement->bindParam(':userID', $userID);
        $statement->execute();

        $results = array();
        $userProductDAO = new UserProductDAO();

        foreach ($statement as $result) {
            array_push($results, $userProductDAO->createDTOFromArray($result));
        }
        
        return $results;
    }

    public function getCartProduct($userID, $productID): DTO
    {
        $query = "SELECT u.amount FROM users_products u WHERE u.userID = :userID and u.productID = :productID" ;
        $statement = $this->m_DatabaseProxy->prepare($query);
        
        $statement->bindParam(':userID', $userID);
        $statement->bindParam(':productID', $productID);
        $statement->execute();

        $amount = $statement->fetchColumn();
        $userProductDTO = new UserProductDTO($userID, $productID, $amount);
        
        
        return $userProductDTO;   
    }

    protected function createDTOFromArray($array): DTO
    {
        
        $userID = $array[self::ID_KEY1];
        $productID = $array[self::ID_KEY2];
        $amount = $array[self::AMOUNT_KEY];
        

        return new UserProductDTO($userID, $productID,$amount);
    }
    
    protected function createArrayFromDTO($dto): array
    {
        $dtoArray = array(
            self::ID_KEY1 => $dto->getID1(),
            self::ID_KEY2 => $dto->getID2(),
            self::AMOUNT_KEY => $dto->getAmount()
        );

        return $dtoArray;
    }

    

}
?>