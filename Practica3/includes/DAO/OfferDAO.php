<?php
namespace es\ucm\fdi\aw\DAO;
    class OfferDAO extends DAO {
        public function __construct($connection) {
            parent::__construct("ofertas", $connection);
        }

        public function create($data) {
            $this->insert($data);
        }
    }

?>