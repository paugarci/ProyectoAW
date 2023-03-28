<?php
namespace es\ucm\fdi\aw\DAO;

    class OfferUsersDAO extends DAO {
        public function __construct($connection) {
            parent::__construct("offers_users", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>