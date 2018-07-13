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
        $sql = 'SELECT * FROM postulates WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
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
        $sql = '
            UPDATE postulates 
            SET accepted = 1
            WHERE offers_id = :offers_id
            AND users_id = :users_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':offers_id', $array['offers_id']);
        $req->execute();
    }

    public function postulateNotExist($array)
    {
        $sql = 'SELECT count(*) FROM postulates WHERE users_id = :users_id AND offers_id = :offers_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':offers_id', $array['offers_id']);
        $req->execute();

        if ($req->fetchColumn() <= 0) {
            return true;
        }

        return false;
    }

    public function getAllAccepted($users_id)
    {
        $sql = '
            SELECT 
                o.id, o.title
            FROM postulates AS p
            INNER JOIN offers AS o
            ON o.id = p.offers_id
            WHERE p.users_id = :users_id AND accepted = 1
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $users_id);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllPostulates($users_id)
    {
        $sql = '
            SELECT 
                o.id AS offers_id, o.title, p.accepted, p.id
            FROM postulates AS p
            INNER JOIN offers AS o
            ON o.id = p.offers_id
            WHERE o.users_id = :users_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $users_id);
        $req->execute();

        return $req->fetchAll();
    }
}
 

