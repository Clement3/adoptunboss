<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

class DAOSkill extends DAO
{
    public function create($array) 
    {
        $sql = 'INSERT INTO skills (name, activities_id) VALUES (:name, :activities_id)';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);
        $req->bindParam(':activities_id', $array['activitie']);

        return $req->execute();
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM skills WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);

        return $req->execute();
    }

    public function getAll() 
    {
        $sql = 'SELECT s.id, s.name, a.name AS activitie_name FROM skills AS s INNER JOIN activities as a ON s.activities_id = a.id ORDER BY name DESC';

        $req = $this->getPdo()->prepare($sql);
        $req->execute();

        return $req->fetchAll();
    }

    public function getAllBy($filter) 
    {
        
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT id, name, activities_id FROM skills WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public function update($array) 
    {
        $sql = 'UPDATE skills SET name = :name WHERE id = :id';
        
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':name', $array['name']);
        $req->bindParam(':id', $array['id']);

        return $req->execute();
    }

    public function allSkillsByActivitieId($id)
    {
        $sql = 'SELECT id, name FROM skills WHERE activities_id = :activities_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':activities_id', $id);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function allSkillsForProfile($id)
    {
        $sql = '
            SELECT s.id, s.name 
            FROM profiles_has_skills AS p 
            INNER JOIN skills AS s 
            ON s.id = p.skills_id
            WHERE p.profiles_id = :profiles_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':profiles_id', $id);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function allSkillsForOffer($id)
    {
        $sql = '
            SELECT s.id, s.name 
            FROM offers_has_skills AS o 
            INNER JOIN skills AS s 
            ON s.id = o.skills_id
            WHERE o.offers_id = :offers_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':offers_id', $id);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}