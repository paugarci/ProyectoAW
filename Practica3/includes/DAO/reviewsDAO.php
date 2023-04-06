<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\ReviewsDTO;

class ReviewsDAO extends DAO
{
    private const TABLE_NAME = 'reviews';
    private const ID_KEY = 'id';
    private const COMMENT_KEY = 'comment';
    private const REVIEW_KEY = 'review';
    private const DATE_KEY = 'date';
    
    //  Constructors
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    //  Methods

    protected function createDTOFromArray($array): DTO
    {
        $id = $array[self::ID_KEY];
        $comment = $array[self::COMMENT_KEY];
        $review = $array[self::REVIEW_KEY];
        $date = $array[self::DATE_KEY];

        return new ProductDTO($id, $comment, $review, $date);
    }

    protected function createArrayFromDTO($dto): array
    {
        return array(
            self::ID_KEY => $dto->getID(),
            self::COMMENT_KEY => $dto->getComment(),
            self::REVIEW_KEY => $dto->getReview(),
            self::DATE_KEY => $dto->getDate()
        );
    }
}

?>