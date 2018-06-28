<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAONews extends DAO
{
    public function limit($number)
    {
        $sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 0, ' . $number . '  ';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        
        return $req->fetchAll();      
    }

    public function create($array) 
    {
        $sql = $this->getPdo()->prepare('INSERT INTO news (title, content, short_content) VALUES (:title, :content, :short_content)');
        $sql->execute($array);
    }

    public function delete($id) 
    {
        $sql = $this->getPdo()->exec('DELETE FROM news WHERE id = '. $id .'');
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('SELECT * FROM news');
        return $sql->fetchAll();
    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {
        $sql = $this->getPdo()->query('SELECT * FROM news WHERE id = '. $id .'');
        return $sql->fetch();
    }

    public function update($array) 
    {
        $sql = $this->getPdo()->prepare('UPDATE news SET title = :title, short_content = :short_content content = :content, updated_date = NOW() WHERE id = :id');
        $sql->execute($array);
    }

}
