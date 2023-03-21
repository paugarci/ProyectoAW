<?php

    class EventDAO extends DAO {
        public function __construct(PDO $connection) {
            parent::__construct("eventos", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>