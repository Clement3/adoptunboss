<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOAuth;

/**
 * Description of ViewController
 *
 */
class AuthController extends Controller
{
    public function getLogin()
    {
        $this->render("auth/login");
    }

    public function postLogin()
    {
        $dao = new DAOAuth();

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            if (isset($_POST['password']) && !empty($_POST['password'])) {
                $user = $dao->login([
                    'email' => $_POST['email']
                ]);
                
                if ($user) {
                    if (password_verify($_POST['password'], $user['password'])) {

                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'is_admin' => $user['is_admin'],
                            'is_recruiter' => $user['is_recruiter'],
                            'is_premium' => $user['is_premium']
                        ];

                        $this->helper()->redirect();

                        // Vous êtes bien connecter
                    }

                    // Mot de passe incorrect
                }

                // L'email n'existe pas
            }

            // Password est vide
        }

        // Email est vide
    }

    public function getRegister()
    {
        $this->render("auth/register");
    }

    public function postRegister()
    {

    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->helper()->redirect('login');
    }
}
