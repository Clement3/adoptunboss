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

    public function update($id) {
       
        $sql = $this->getPdo()->prepare('UPDATE events SET `title`=`:title` ,`description`= `:description` ,`content`= `:content`,`start_date`= `:start_date`,`end_date`= `:end_date`,`created_date`= `:created_date`,`updated_date`=`NOW()`,`locations_id`= `1`  WHERE id = '. $id .'');
        $sql->execute($id);
    }


    public function store(array $array) {
        $sql = $this->getPdo()->prepare('INSERT INTO events (`title`, `description`, `content`, `start_date`, `end_date`, `created_date`, `locations_id`) VALUES(:title, :description, :content, :start_date, :end_date, NOW(),1)');
       $sql->execute($array);
    }
    

}
