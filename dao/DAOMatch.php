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
        $sql = '
            SELECT o.*, m.indice, m.id AS match_id
            FROM matchs AS m
            INNER JOIN offers AS o
            ON o.id = m.offers_id
            WHERE m.users_id = :users_id
            ORDER BY m.indice DESC
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $filter);
        $req->execute();

        return $req->fetchAll();
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT * FROM matchs WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public function update($array)
    {
       
    }

    public function view($id)
    {
        $bool = true;

        $sql = 'UPDATE matchs SET view = :view WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->bindParam(':view', $bool);
        $req->execute();
    }

    public function countMatchs($id)
    {
        $sql = 'SELECT count(*) FROM matchs WHERE users_id = :users_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $id);
        $req->execute();

        return $req->fetchColumn();
    }
}