<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOActivitie extends DAO
{
    public function create($array) 
    {
        $sql = 'INSERT INTO activities (name) VALUES (:name)';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);

        return $req->execute();
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM activities WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);

        return $req->execute();
    }

    public function getAll() 
    {
        $sql = 'SELECT id, name FROM activities ORDER BY name DESC';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT id, name FROM activities WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public function update($array) 
    {
        $sql = 'UPDATE activities SET name = :name WHERE id = :id';
        
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);
        $req->bindParam(':id', $array['id']);

        return $req->execute();
    }
}