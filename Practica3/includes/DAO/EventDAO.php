<?php
namespace es\ucm\fdi\aw\DAO;

    class EventDAO extends DAO {
        public function __construct($connection) {
            parent::__construct("eventos", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>