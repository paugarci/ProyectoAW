<?php

    class OfferUsersDAO extends DAO {
        public function __construct(PDO $connection) {
            parent::__construct("offers_users", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>