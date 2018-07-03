<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOEmployment extends DAO
{
    public function create($array) 
    {
        $sql = 'INSERT INTO employments (name, has_period) VALUES (:name, :has_period)';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);
        $req->bindParam(':has_period', $array['period']);

        return $req->execute();
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM employments WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);

        return $req->execute();
    }

    public function getAll() 
    {
        $sql = 'SELECT id, name, has_period FROM employments ORDER BY name DESC';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT id, name, has_period FROM employments WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public function update($array) 
    {
        $sql = 'UPDATE employments SET name = :name, has_period = :has_period WHERE id = :id';
        
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);
        $req->bindParam(':has_period', $array['period']);
        $req->bindParam(':id', $array['id']);

        return $req->execute();
    }
}