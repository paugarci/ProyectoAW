<?php

    class EventUsersDAO extends DAO {
        public function __construct(PDO $connection) {
            parent::__construct("events_users", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>