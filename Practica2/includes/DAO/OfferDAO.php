<?php

    class OfferDAO extends DAO {
        public function __construct(PDO $connection) {
            parent::__construct("ofertas", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>