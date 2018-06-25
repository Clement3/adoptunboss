<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAONews extends DAO
{

    public function create($array) {
        $sql = $this->getPdo()->exec('CREATE FROM news SET title = :title, content = :content');
        $sql->exec($array);
        
    }

    public function delete($id) {
        $sql = $this->getPdo()->exec('DELETE FROM news WHERE id = '. $id .'');
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('SELECT * FROM news');
        return $sql->fetchAll();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        $sql = $this->getPdo()->query('SELECT * FROM news WHERE id = '. $id .'');
        return $sql->fetch();
    }

    public function update($array) {
        $sql = $this->getPdo()->prepare('UPDATE news SET title = :title, content = :content, updated_date = NOW() WHERE id = :id');
        $sql->execute($array);
    }

}
