<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

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
        $sql = '
        INSERT INTO events (
            title, short_content, content, 
            start_date, end_date, latitude, 
            longitude, created_date
        )
        VALUES (
            :title, :short_content, :content,
            :start_date, :end_date, :latitude,
            :longitude, NOW()
        )';
        $req = $this->getPdo()->prepare($sql);

        $req->bindParam(':title', $array['title']);
        $req->bindParam(':short_content', $array['short_content']);
        $req->bindParam(':content', $array['content']);
        $req->bindParam(':start_date', $array['start_date']);
        $req->bindParam(':end_date', $array['end_date']);
        $req->bindParam(':latitude', $array['latitude']);
        $req->bindParam(':longitude', $array['longitude']);

        return $req->execute();        
    }

    public function delete($id) 
    {
        $sql = $this->getPdo()->query('DELETE FROM events WHERE id = '. $id .'');
        return $sql->execute();
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
                latitude = :latitude,
                longitude = :longitude,
                updated_date = NOW()
                WHERE id = :id
            ');
        $sql->bindParam(':title', $array['title']);
        $sql->bindParam(':short_content' , $array['short_content']);
        $sql->bindParam(':content', $array['content']);
        $sql->bindParam(':start_date', $array['start_date']);
        $sql->bindParam(':end_date', $array['end_date']);
        $sql->bindParam(':latitude', $array['latitude']);
        $sql->bindParam(':longitude', $array['longitude']);
        $sql->bindParam('id', $array['id']);

        return $sql->execute();
    }

    public function getLastFive()
    {
        $sql = $this->getPDO()->query('
            SELECT *
            FROM events 
            ORDER BY created_date DESC
            LIMIT 5
        ');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }    
}