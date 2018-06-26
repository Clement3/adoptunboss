<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOEvent extends DAO
{

    public function create($array) {
        
    }

    public function delete($id) {
        $sql = $this->getPdo()->query('DELETE FROM events WHERE id = '. $id .'');
       // $sql->execute($id);
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
                description = :description,
                content = :content,
                start_date = :start_date,
                end_date = :end_date,
                updated_date = NOW()
                WHERE id = :id
            ');
        $sql->bindParam(':title', $array['title']);
        $sql->bindParam(':description' , $array['description']);
        $sql->bindParam(':content', $array['content']);
        $sql->bindParam(':start_date', $array['start_date']);
        $sql->bindParam('end_date', $array['end_date']);
        $sql->bindParam('id', $array['id']);
        var_dump($array);
        $sql->execute();
        
    }


    public function store(array $array) {
        $sql = $this->getPdo()->prepare('INSERT INTO events (`title`, `description`, `content`, `start_date`, `end_date`, `created_date`, `locations_id`) VALUES(:title, :description, :content, :start_date, :end_date, NOW(),1)');
       $sql->execute($array);
    }
    

}