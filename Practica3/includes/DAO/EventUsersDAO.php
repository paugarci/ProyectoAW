<?php
namespace es\ucm\fdi\aw\DAO;

    class EventUsersDAO extends DAO {
        public function __construct($connection) {
            parent::__construct("events_users", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>