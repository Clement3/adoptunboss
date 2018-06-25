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
        $sql = $this->getPdo()->prepare('SELECT id, email, password, is_admin, is_recruiter, is_premium FROM users WHERE email = :email');
        $sql->bindParam(':email', $array['email']);
        $sql->execute();

        return $sql->fetch();
    }

    public function register(Array $array)
    {
        $sql = $this->getPdo()->prepare('INSERT INTO users (email, password, firstname, lastname, created_date, is_recruiter) VALUES (:email, :password, :firstname, :lastname, NOW(), :is_recruiter)');
        $sql->bindParam(':email', $array['email']);
        $sql->bindParam(':password', $array['password']);
        $sql->bindParam(':firstname', $array['firstname']);
        $sql->bindParam(':lastname', $array['lastname']);
        $sql->bindParam(':is_recruiter', $array['is_recruiter']);
        $sql->execute();

        var_dump($sql);
        
        return true;
    }
}
