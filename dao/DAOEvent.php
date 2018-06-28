<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOEvent extends DAO
{
    public function limit($number)
    {
        $sql = 'SELECT * FROM events ORDER BY id DESC LIMIT 0, ' . $number . '  ';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();

        return $req->fetchAll();      
    }

    public function create($array) 
    {
        $sql = $this->getPdo()->prepare('INSERT INTO events (`title`, `short_content`, `content`, `start_date`, `end_date`, `created_date`) VALUES(:title, :short_content, :content, :start_date, :end_date, NOW())');
        return $sql->execute($array);        
    }

    public function delete($id) 
    {
        $sql = $this->getPdo()->query('DELETE FROM events WHERE id = '. $id .'');
        return $sql->execute($id);
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('SELECT * FROM events');
        return $sql->fetchAll();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        $sql = $this->getPdo()->query('SELECT * FROM events WHERE id = '. $id .'');
        return $sql->fetch();
    }

    public function update($array) {
       
        $sql = $this->getPDO()->prepare('
            UPDATE events 
            SET 
                title = :title,
                short_content = :short_content,
                content = :content,
                start_date = :start_date,
                end_date = :end_date,
                updated_date = NOW()
                WHERE id = :id
            ');
        $sql->bindParam(':title', $array['title']);
        $sql->bindParam(':short_content' , $array['short_content']);
        $sql->bindParam(':content', $array['content']);
        $sql->bindParam(':start_date', $array['start_date']);
        $sql->bindParam('end_date', $array['end_date']);
        $sql->bindParam('id', $array['id']);

        return $sql->execute();
    }
}