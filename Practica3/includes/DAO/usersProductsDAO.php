<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\UsersProductsDTO;

class UsersProductsDAO extends DAO
{
    private const TABLE_NAME = 'users_products';
    private const USER_ID_KEY = 'userID';
    private const PRODUCT_ID_KEY = 'productID';
    private const AMOUNT_KEY = 'amount';

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    protected function createDTOFromArray($array): DTO
    {
        $userID = $array[self::USER_ID_KEY];
        $productID = $array[self::PRODUCT_ID_KEY];
        $amount = $array[self::AMOUNT_KEY];
        

        return new UsersProductsDTO($userID, $productID,$amount);
    }
    
    protected function createArrayFromDTO($dto): array
    {
        $dtoArray = array(
            self::USER_ID_KEY => $dto->getUserID(),
            self::PRODUCT_ID_KEY => $dto->getProductID(),
            self::AMOUNT_KEY => $dto->getAmount()
        );

        return $dtoArray;
    }
}
?>