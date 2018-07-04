<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

class DAOProfile extends DAO
{
    public function addSkill($array)
    {
        $sql = 'INSERT INTO profiles_has_skills (skills_id, profiles_id) VALUES (:skills_id, :profiles_id)';
       
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':skills_id', $array['skills_id']);
        $req->bindParam(':profiles_id', $array['profiles_id']);

        $req->execute();
    }

    public function deleteAllSkills($profile)
    {
        $sql = 'DELETE FROM profiles_has_skills WHERE profiles_id = :profiles_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':profiles_id', $profile);

        return $req->execute();
    }

    public function create($array)
    {
        $sql = 'INSERT INTO profiles (
            latitude,
            longitude,
            radius,
            salary,
            experience,
            period,
            users_id,
            activities_id,
            employments_id
        ) VALUES (
            :latitude,
            :longitude,
            :radius,
            :salary,
            :experience,
            :period,
            :users_id,
            :activities_id,
            :employments_id
        )';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':latitude', $array['latitude']);
        $req->bindParam(':longitude', $array['longitude']);
        $req->bindParam(':radius', $array['radius']);
        $req->bindParam(':salary', $array['salary']);
        $req->bindParam(':experience', $array['experience']);
        $req->bindParam(':period', $array['period']);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':activities_id', $array['activities_id']);
        $req->bindParam(':employments_id', $array['employments_id']);

        $req->execute();

        $profile_id = $this->getPdo()->lastInsertId();

        foreach ($array['skills'] as $skill) {
            $this->addSkill([
                'profiles_id' => $profile_id,
                'skills_id' => $skill
            ]);
        }       

        return true;
    }

    public function delete($id)
    {

    }

    public function getAll()
    {

    }

    public function getAllBy($filter)
    {

    }

    public function retrieve($id)
    {
        $sql = '
            SELECT 
                p.id, 
                p.latitude, 
                p.longitude, 
                p.radius,
                p.salary,
                p.experience,
                p.period,
                p.activities_id,
                p.employments_id,
                e.name AS employment_name,
                a.name AS activitie_name
            FROM profiles as p 
            INNER JOIN employments AS e
            ON e.id = p.employments_id
            INNER JOIN activities AS a
            ON a.id = p.activities_id            
            WHERE users_id = :user_id
        ';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':user_id', $id);
        $req->execute();

        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function update($array)
    {
        $sql = '
        UPDATE profiles SET
            latitude = :latitude,
            longitude = :longitude,
            radius = :radius,
            salary = :salary,
            experience = :experience,
            period = :period,
            activities_id = :activities_id,
            employments_id = :employments_id
        WHERE users_id = :users_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':latitude', $array['latitude']);
        $req->bindParam(':longitude', $array['longitude']);
        $req->bindParam(':radius', $array['radius']);
        $req->bindParam(':salary', $array['salary']);
        $req->bindParam(':experience', $array['experience']);
        $req->bindParam(':period', $array['period']);
        $req->bindParam(':users_id', $array['users_id']);
        $req->bindParam(':activities_id', $array['activities_id']);
        $req->bindParam(':employments_id', $array['employments_id']);

        $req->execute();

        $profile = $this->getId($array['users_id']);
         
        $this->deleteAllSkills($profile['id']);

        foreach ($array['skills'] as $skill) {
            $this->addSkill([
                'profiles_id' => $profile['id'],
                'skills_id' => $skill
            ]);
        }       
    }

    public function created($user)
    {
        $sql = 'SELECT count(*) FROM profiles WHERE users_id = :users_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $user);
        $req->execute();

        if ($req->fetchColumn() >= 1) {
            return true;
        }

        return false;
    }

    public function getId($user)
    {
        $sql = 'SELECT id FROM profiles WHERE users_id = :users_id';

        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':users_id', $user);
        $req->execute();

        return $req->fetch();
    }
}