<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

class DAOMatch extends DAO
{
    public function create($array) 
    {
        $sql = 'SELECT count(*) FROM matchs WHERE offers_id = :offers_id AND users_id = :users_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':offers_id', $array['offers_id']);
        $req->bindParam(':users_id', $array['users_id']);
        $req->execute();

        if ($req->fetchColumn() <= 0) {
            $sql2 = 'INSERT INTO matchs (offers_id, users_id, indice) VALUES (:offers_id, :users_id, :indice)';
            $req2 = $this->getPdo()->prepare($sql2);
            $req2->bindParam(':offers_id', $array['offers_id']);
            $req2->bindParam(':users_id', $array['users_id']);
            $req2->bindParam(':indice', $array['indice']);
            
            $req2->execute();
        }
    }

    public function delete($id) 
    {

    }

    public function getAll() 
    {

    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {

    }

    public function update($array)
    {
       
    }
}