<?php

class UserRolesDAO extends DAO {

    public function __construct(PDO $connection) {
        parent::__construct("user_roles", $connection);
    }
  
    public function create($data) {
        $this->insert($data);
    }
}