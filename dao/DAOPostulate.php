<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

class DAOPostulate extends DAO
{
    public function create($array)
    {
        $sql = $this->getPDO()->prepare('
            INSERT INTO postulates(
                users_id, 
                offers_id, 
                created_date
                )
            VALUES(
                :users_id, 
                :offers_id, 
                NOW() 
                )
            ');
        
        $sql->execute($array);
    }
    
    public function retrieve($id)
    {
        
    }
    
    public function update($array)
    {

    }
    
    public function delete($id)
    {

    }

    public function getAll()
    {
        $sql = $this->getPDO()->query('
            SELECT postulates.users_id, offers.title, postulates.offers_id, postulates.created_date
            FROM postulates 
            INNER JOIN offers 
            ON postulates.offers_id = offers.id 
        ');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllBy($filter)
    {

    }

    public function acceptCandidate($array)
    {
        $sql = $this->getPDO()->prepare('
            UPDATE postulates 
            SET accepted = 1
            WHERE offers_id = :offers_id 
            AND users_id = :users_id
        ');
        $sql->execute($array);
    }

    public function postulateExist($userId)
    {
        $sql = $this->getPDO()->query('
            SELECT users_id 
            FROM Postulates 
            WHERE users_id = '. $userId .'
        ');
        return $sql->fetch();
    }
}
 

