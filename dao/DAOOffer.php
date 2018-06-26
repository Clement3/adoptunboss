<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOOffer extends DAO
{
    public function addSkill($array)
    {
        $sql = 'INSERT INTO offers_has_skills (skills_id, offers_id) VALUES (:skills_id, :offers_id)';
       
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':skills_id', $array['skills_id']);
        $req->bindParam(':offers_id', $array['offers_id']);

        $req->execute();
    }

    public function create($array) 
    {        
        $sql = '
        INSERT INTO 
        offers (users_id, title, content, salary_min, salary_max, zip_code, activities_id, employments_id) 
        VALUES 
        (:users_id, :title, :content, :salary_min, :salary_max, :zip_code, :activities_id, :employments_id)';

        $req = $this->getPDO()->prepare($sql);
        
        $req->bindParam(':title', $array['title']);
        $req->bindParam(':content', $array['content']);
        $req->bindParam(':salary_min', $array['salary_min']);
        $req->bindParam(':salary_max', $array['salary_max']);
        $req->bindParam(':zip_code', $array['zip_code']);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':activities_id', $array['activities_id']);
        $req->bindParam(':employments_id', $array['employments_id']);
        
        $req->execute();

        $offer_id = $this->getPdo()->lastInsertId();

        foreach ($array['skills'] as $skill) {
            $this->addSkill([
                'offers_id' => $offer_id,
                'skills_id' => $skill
            ]);
        }
    }

    public function delete($id) {
        $sql = $this->getPDO()->exec('
        DELETE FROM offers 
        WHERE id = '. $id .'
        ');
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('
        SELECT * 
        FROM offers
        ORDER BY created_date DESC
        ');
        return $sql->fetchAll();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        $sql = $this->getPdo()->query('
        SELECT * 
        FROM offers 
        WHERE id = '. $id .''
        );
        return $sql->fetch();
    }

    public function update($array) {
        $sql = $this->getPDO()->prepare('
            UPDATE offers
            SET
                title = :title, 
                content = :content, 
                updated_date = NOW(), 
                zip_code = :zip_code, 
                salary_min = :salary_min, 
                salary_max = :salary_max, 
                experience = :experience, 
                period = :period
            WHERE id = :id
        ');
        $sql->execute($array);
    }
}