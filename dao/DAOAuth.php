<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAODefault
 *
 * @author loic
 */
class DAOAuth extends DAO 
{
    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    public function login(Array $array)
    {
        $sql = $this->getPdo()->prepare('SELECT email, password FROM users WHERE email = :email');
        $sql->bindParam(':email', $array['email']);
        $sql->execute();

        return $sql->fetch();
    }
}
