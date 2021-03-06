<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

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

    public function deleteAllSkills($offer)
    {
        $sql = 'DELETE FROM offers_has_skills WHERE offers_id = :offers_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':offers_id', $offer);

        return $req->execute();
    }

    public function create($array) 
    {        
        $sql = '
        INSERT INTO offers (
            users_id, 
            title, 
            content, 
            salary_min, 
            salary_max, 
            activities_id, 
            employments_id,
            latitude,
            longitude,
            period,
            experience,
            place,
            created_date
        ) VALUES (
            :users_id, 
            :title, 
            :content, 
            :salary_min, 
            :salary_max, 
            :activities_id, 
            :employments_id,
            :latitude,
            :longitude,
            :period,
            :experience,
            :place,
            NOW()
        )';

        $req = $this->getPDO()->prepare($sql);
        
        $req->bindParam(':title', $array['title']);
        $req->bindParam(':content', $array['content']);
        $req->bindParam(':salary_min', $array['salary_min']);
        $req->bindParam(':salary_max', $array['salary_max']);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':activities_id', $array['activities_id']);
        $req->bindParam(':employments_id', $array['employments_id']);
        $req->bindParam(':latitude', $array['latitude']);
        $req->bindParam(':longitude', $array['longitude']);
        $req->bindParam(':period', $array['period']);
        $req->bindParam(':experience', $array['experience']);
        $req->bindParam(':place', $array['place']);

        $req->execute();

        $offer_id = $this->getPdo()->lastInsertId();

        foreach ($array['skills'] as $skill) {
            $this->addSkill([
                'offers_id' => $offer_id,
                'skills_id' => $skill
            ]);
        }

        return true;
    }

    public function delete($id) 
    {
        $bool = true;

        $sql = 'UPDATE offers SET closed = :closed WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->bindParam(':closed', $bool);
        $req->execute();
    }

    public function getAll() 
    {
        $sql = $this->getPdo()->query('
        SELECT 
            o.id, o.title, o.content, o.salary_min, o.salary_max, 
            o.experience, o.latitude, o.longitude, o.created_date,
            o.period, o.place, o.closed, o.activities_id, o.employments_id,
            e.name AS employment_name,
            a.name AS activitie_name,
            u.email AS email
        FROM offers AS o
        INNER JOIN employments AS e
        ON e.id = o.employments_id
        INNER JOIN activities AS a
        ON a.id = o.activities_id
        INNER JOIN users AS u
        ON u.id = o.users_id
        ');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) 
    {
        $sql = '
            SELECT 
                o.id, o.title, o.content, o.salary_min, o.salary_max, 
                o.experience, o.latitude, o.longitude, o.created_date,
                o.period, o.place, o.users_id,
                e.name AS employment_name,
                a.name AS activitie_name,
                e.has_period 
            FROM offers AS o
            INNER JOIN employments AS e
            ON e.id = o.employments_id
            INNER JOIN activities AS a
            ON a.id = o.activities_id
            WHERE o.id = :id      
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function update($array) {
        $sql = '
        UPDATE offers SET
            title = :title, 
            content = :content, 
            salary_min = :salary_min, 
            salary_max = :salary_max, 
            latitude = :latitude,
            longitude = :longitude,
            period = :period,
            experience = :experience,
            place = :place,
            activities_id = :activities_id, 
            employments_id = :employments_id,
            updated_date = NOW()
        WHERE id = :id            
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':title', $array['title']);
        $req->bindParam(':content', $array['content']);
        $req->bindParam(':salary_min', $array['salary_min']);
        $req->bindParam(':salary_max', $array['salary_max']);
        $req->bindParam(':activities_id', $array['activities_id']);
        $req->bindParam(':employments_id', $array['employments_id']);
        $req->bindParam(':latitude', $array['latitude']);
        $req->bindParam(':longitude', $array['longitude']);
        $req->bindParam(':period', $array['period']);
        $req->bindParam(':experience', $array['experience']);
        $req->bindParam(':place', $array['place']);
        $req->bindParam(':id', $array['id']);

        $req->execute();

        $this->deleteAllSkills($array['id']);

        foreach ($array['skills'] as $skill) {
            $this->addSkill([
                'offers_id' => $array['id'],
                'skills_id' => $skill
            ]);
        }        
    }

    public function getAllByUserId($id)
    {
        $sql = '
            SELECT 
                o.id, o.title, o.content, o.salary_min, o.salary_max, 
                o.experience, o.latitude, o.longitude, o.created_date,
                e.name AS employment_name,
                a.name AS activitie_name 
            FROM offers AS o
            INNER JOIN employments AS e
            ON e.id = o.employments_id
            INNER JOIN activities AS a
            ON a.id = o.activities_id
            WHERE o.users_id = :user_id 
            AND closed = 0
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':user_id', $id);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSkillsByOfferId($id)
    {
        $sql = '
            SELECT s.name 
            FROM offers_has_skills AS os 
            INNER JOIN skills AS s 
            ON s.id = os.skills_id 
            WHERE os.offers_id = :offer_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':offer_id', $id);
        $req->execute();
        
        return $skills = [
            'skills' => $req->fetchAll(PDO::FETCH_ASSOC)
        ];
    }

    public function getSkillsForOffer($id)
    {
        $sql = '
            SELECT s.name 
            FROM offers_has_skills AS os 
            INNER JOIN skills AS s 
            ON s.id = os.skills_id 
            WHERE os.offers_id = :offer_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':offer_id', $id);
        $req->execute();
        
        return $req->fetchAll(PDO::FETCH_ASSOC);      
    }
}