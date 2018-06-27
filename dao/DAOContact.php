<?php
//contact admin

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOContact extends DAO{

    public function create($array) 
    {
        $sql = 'INSERT INTO contacts 
        (email, full_name, title, content, created_date) 
        VALUES 
        (:email, :full_name, :title, :content, NOW())';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':email', $array['email']);
        $req->bindParam(':full_name', $array['full_name']);
        $req->bindParam(':title', $array['title']);
        $req->bindParam(':content', $array['content']);

        return $req->execute();
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM contacts WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);

        return $req->execute();
    }

    public function getAll() 
    {
        $sql = 'SELECT * FROM contacts ORDER BY created_date DESC';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT * FROM contacts WHERE id = :id';
        
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);

        $req->execute();

        return $req->fetch();        
    }

    public function update($array) 
    {
        
    }
}