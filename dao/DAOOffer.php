<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

class DAOOffer extends DAO
{
    public function create($array) {
        $sql = $this->getPDO()->prepare('
            INSERT INTO offers (
                title, 
                content, 
                created_date, 
                zip_code, 
                salary_min, 
                salary_max, 
                activities_id, 
                experience, 
                closed, 
                period,
                users_id, 
                employments_id
                )
            VALUES (
                :title, 
                :content,
                NOW(), 
                :zip_code, 
                :salary_min, 
                :salary_max, 
                :activities_id, 
                :experience, 
                :closed, 
                :period, 
                :users_id, 
                :employments_id
                )
        ');
        $sql->execute($array);
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