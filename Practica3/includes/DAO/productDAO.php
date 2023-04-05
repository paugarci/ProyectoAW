<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\ProductDTO;

class ProductDAO extends DAO
{

    private const TABLE_NAME = 'products';
    private const ID_KEY = 'id';
    private const NAME_KEY = 'name';
    private const DESCRIPTION_KEY = 'description';
    private const IMG_PATH_KEY = 'imgPath';
    private const PRICE_KEY = 'price';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    //  Methods

    protected function createDTOFromArray($array): DTO
    {
        $id = $array[self::ID_KEY];
        $name = $array[self::NAME_KEY];
        $description = $array[self::DESCRIPTION_KEY];
        $imgPath = $array[self::IMG_PATH_KEY];
        $price = $array[self::PRICE_KEY];

        return new ProductDTO($id, $name, $description, $imgPath, $price);
    }
    protected function createArrayFromDTO($dto): array
    {
        return array(
            self::ID_KEY => $dto->getID(),
            self::NAME_KEY => $dto->getName(),
            self::DESCRIPTION_KEY => $dto->getDescription(),
            self::IMG_PATH_KEY => $dto->getImgName(),
            self::PRICE_KEY => $dto->getPrice()
        );
    }
}