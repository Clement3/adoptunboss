<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAONewsletter extends DAO{
   
    public function getAll()
    {
        $sql = $this->getPdo()->prepare('SELECT * FROM newsletters');
        $sql->execute();

        return $sql->fetchAll();
    }

    public function create($array) {
        
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM newsletters WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        
        return $req->execute();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
       
    }

    public function update($array) {
        
    }

    public function store($array) {
        
        $sql = $this->getPDO()->prepare('
            INSERT INTO newsletters (
                email, 
                created_date
            ) 
            VALUES(
                :email,
                NOW()
            )
        ');

        $sql->bindParam(':email', $array['email']);

        return $sql->execute();
    }

    public function unsubscribe($email)
    {
        $sql = $this->getPdo()->prepare('UPDATE newsletters SET unsubscribe = 1 WHERE email = :email');
        $sql->bindParam(':email', $email);

        return $sql->execute();
    }
}