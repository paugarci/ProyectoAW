<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\UserReviewDTO;

class UserReviewDAO extends DAO
{
    private const TABLE_NAME = 'product_user_reviews';
    private const REVIEWID_KEY = 'review_id';
    private const PRODUCTID_KEY = 'product_id';
    private const USERID_KEY = 'user_id';

    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    public function getReviewsUser($userID): array
    {
        $query = "SELECT r.* FROM product_user_reviews pur INNER JOIN reviews r ON pur.review_id = r.id INNER JOIN products p ON pur.product_id = p.id WHERE pur.user_id = :userID";

        $statement = $this->m_DatabaseProxy->prepare($query);
        $statement->bindParam(':userID', $userID);
        $statement->execute();

        $results = array();
        $userReviewDAO = new UserReviewDAO();

        foreach ($statement as $result) {
            array_push($results, $userReviewDAO->createDTOFromArray($result));
        }

        return $results;

    }

    protected function createDTOFromArray($array): DTO
    {
        $userID = $array[self::USERID_KEY];
        $productID = $array[self::PRODUCTID_KEY];
        $reviewID = $array[self::REVIEWID_KEY];

        return new UserReviewDTO($userID, $productID, $reviewID);
    }
    
    protected function createArrayFromDTO($dto): array
    {
        $dtoArray = array(
            self::REVIEWID_KEY => $dto->getReviewID(),
            self::PRODUCTID_KEY => $dto->getProductID(),
            self::USERID_KEY => $dto->getUserID()
        );

        return $dtoArray;
    }
}
?>