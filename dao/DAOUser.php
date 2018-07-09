<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

/**
 * Users
 */
class DAOUser extends DAO 
{
    public function create($array) 
    {
        $sql = 'INSERT INTO users 
        (email, password, firstname, lastname, created_date, is_recruiter, is_admin) 
        VALUES 
        (:email, :password, :firstname, :lastname, NOW(), :is_recruiter, :is_admin)';

        $req = $this->getPdo()->prepare($sql);
        
        $req->bindParam(':email', $array['email']);
        $req->bindParam(':password', $array['password']);
        $req->bindParam(':firstname', $array['firstname']);
        $req->bindParam(':lastname', $array['lastname']);
        $req->bindParam(':is_recruiter', $array['is_recruiter']);
        $req->bindParam(':is_admin', $array['is_admin']);

        return $req->execute();        
    }

    public function delete($id) 
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        
        return $req->execute();
    }

    public function getAll() 
    {
        $sql = 'SELECT id, email, firstname, lastname, is_recruiter, is_admin FROM users ORDER BY created_date DESC LIMIT 0,10';
        $req = $this->getPdo()->query($sql);
        
        return $req->fetchAll();
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) 
    {
        $sql = 'SELECT id, email, firstname, lastname, tel, birthday, is_admin, is_recruiter, created_date FROM users WHERE id = :id';
        $req = $this->getPdo()->prepare($sql);
        $req->bindParam(':id', $id);
        $req->execute();

        return $req->fetch();
    }

    public function update($array) 
    {
        $sql = 'UPDATE users SET 
            email = :email, 
            firstname = :firstname, 
            lastname = :lastname,
            tel = :tel, 
            birthday = :birthday, 
            is_admin = :is_admin,
            is_recruiter = :is_recruiter,
            updated_date = NOW() 
        WHERE id = :id';

        $req = $this->getPdo()->prepare($sql);

        $req->bindParam(':email', $array['email']);
        $req->bindParam(':firstname', $array['firstname']);
        $req->bindParam(':lastname', $array['lastname']);
        $req->bindParam(':tel', $array['phone']);
        $req->bindParam(':birthday', $array['birthday']);
        $req->bindParam(':is_admin', $array['is_admin']);
        $req->bindParam(':is_recruiter', $array['is_recruiter']);
        $req->bindParam(':id', $array['id']);

        return $req->execute();
    }

    public function login(Array $array)
    {
        $sql = $this->getPdo()->prepare('SELECT id, email, password, is_admin, is_recruiter, is_premium FROM users WHERE email = :email');
        $sql->bindParam(':email', $array['email']);
        $sql->execute();

        return $sql->fetch();
    }

    public function getLastFiveRecruiters()
    {
        $sql = $this->getPDO()->query('
            SELECT *
            FROM users
            WHERE is_recruiter = 1
            ORDER BY created_date DESC
            LIMIT 5
        ');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function getLastFiveCandidates()
    {
        $sql = $this->getPDO()->query('
            SELECT *
            FROM users
            WHERE is_recruiter = 0
            AND is_admin = 0
            ORDER BY created_date DESC
            LIMIT 5
        ');
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }       
}
