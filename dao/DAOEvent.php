<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOEvent extends DAO
{

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('SELECT * FROM events');
        return $sql->fetchAll();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        $sql = $this->getPdo()->query('SELECT * FROM events WHERE id = '. $id .'');
        return $sql->fetch();
    }

    public function update($array) {
        
    }

}
