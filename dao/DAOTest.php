<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAODefault
 *
 * @author loic
 */
class DAOTest extends DAO
{

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        $req = $this->getPdo()->query('SELECT * FROM users');
        return $req->fetchAll();

    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

}
