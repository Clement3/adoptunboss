<?php

namespace BWB\Framework\mvc;

class Helpers 
{
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
}