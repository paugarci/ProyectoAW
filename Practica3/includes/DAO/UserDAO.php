<?php

namespace es\ucm\fdi\aw\DAO;

require_once 'includes/config.php';

use es\ucm\fdi\aw\DTO\DTO;
use es\ucm\fdi\aw\DTO\UserDTO;

class UserDAO extends DAO
{
    //  Constants
    private const TABLE_NAME = 'users';

    private const ID_KEY = 'id';
    private const NAME_KEY = 'name';
    private const SURNAME_KEY = 'surname';
    private const EMAIL_KEY = 'email';
    private const PASSWORD_HASH_KEY = 'passwordHash';

    //  Constructors
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    //  Methods
    public function getUserRoles($userID): array
    {
        $query = "SELECT r.id, r.roleName FROM roles r INNER JOIN user_roles ur ON r.id = ur.roleID WHERE ur.userID = :userID;";

        $statement = $this->m_DatabaseProxy->prepare($query);
        $statement->bindParam(':userID', $userID);
        $statement->execute();

        $results = array();
        $roleDAO = new RoleDAO();

        foreach ($statement as $result) {
            array_push($results, $roleDAO->createDTOFromArray($result));
        }



        return $results;
    }

    protected function createDTOFromArray($array): DTO
    {
        $id = isset($array[self::ID_KEY]) ? $array[self::ID_KEY] : -1;
        $name = $array[self::NAME_KEY];
        $surname = $array[self::SURNAME_KEY];
        $email = $array[self::EMAIL_KEY];
        $passwordHash = $array[self::PASSWORD_HASH_KEY];

        return new UserDTO($id, $name, $surname, $email, $passwordHash);
    }
    protected function createArrayFromDTO($dto): array
    {
        $dtoArray = array(
            self::NAME_KEY => $dto->getName(),
            self::SURNAME_KEY => $dto->getSurname(),
            self::EMAIL_KEY => $dto->getEmail(),
            self::PASSWORD_HASH_KEY => $dto->getPasswordHash()
        );

        if ($dto->getID() != -1)
            $dtoArray[self::ID_KEY] = $dto->getID();

        return $dtoArray;
    }
}
