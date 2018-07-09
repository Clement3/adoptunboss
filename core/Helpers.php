<?php

namespace BWB\Framework\mvc;

use BWB\Framework\mvc\dao\DAOMatch;

class Helpers 
{
    public $session = [];

    /**
     * Return l'url de base du site
     * @param string $url
     * @return string
     */
    public function base_url(String $url = null): String
    {
        return 'http://' . $_SERVER['SERVER_NAME'] . '/' . $url;
    }

    /**
     * redirection
     * @param string $url
     */
    public function redirect(String $url = null)
    {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/' . $url .'');

        exit();

        return $this;
    }

    /**
     * Pour envoyer des erreurs avec une redirection
     * @param array $errors
     * @return void
     */
    public function withErrors(Array $errors)
    {
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
        }
        
        return $this;
    }

    /**
     * Si il y à des erreurs
     * @return bool
     */
    public function hasErrors(): Bool
    {
        return isset($_SESSION['errors']);
    }

    /**
     * Récupère toutes les erreurs et les enlèves de la session
     */
    public function errors()
    {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);

        return $errors;
    }

    /**
     * Stock dans la session des données
     * @param string $key
     * @param array $data
     * @return void
     */
    public function with(String $key, Array $data)
    {
        $_SESSION[$key] = $data;

        return $this;
    }

    /**
     * Si la session existe
     * @param string $key
     */
    public function has(String $key)
    {
        if (isset($_SESSION[$key])) {
            $this->session = $_SESSION[$key];
            unset($_SESSION[$key]);

            return true;
        }
    }

    /**
     * Utilisateur est connecté
     * @return bool
     */
    public function is_auth(): Bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Si l'utilisateur connecté est bien égale à l'utilisateur de la resource
     * @param int $user_id
     * @return bool
     */
    public function is_user(Int $user_id): Bool
    {
        return isset($_SESSION['user']['id']) && $_SESSION['user']['id'] === $user_id;
    }

    /**
     * Si l'utilisateur est premium
     * @return bool
     */
    public function is_premium(): Bool
    {
        return isset($_SESSION['user']['is_premium']) && $_SESSION['user']['is_premium'];
    }

    /**
     * Si l'utilisateur est un recruteur
     * @return bool
     */
    public function is_recruiter(): Bool
    {
        return isset($_SESSION['user']['is_recruiter']) && $_SESSION['user']['is_recruiter'];
    }

    /**
     * Si l'utilisateur est un admin
     * @return bool
     */
    public function is_admin(): Bool
    {
        return isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'];
    }

    public function countMatchs()
    {
        $dao = new DAOMatch();

        echo $dao->countMatchs($_SESSION['user']['id']);
    }
}
