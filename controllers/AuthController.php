<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOAuth;
use BWB\Framework\mvc\Validation;

class AuthController extends Controller
{
    public function getLogin()
    {
        $this->render("auth/login");
    }

    public function postLogin()
    {
        $dao = new DAOAuth();

        $validation = new Validation($_POST, $dao);

        $validation->field('email', 'e-mail')->notEmpty()->isEmail()->exist('users');
        $validation->field('password', 'mot de passe')->notEmpty();

        if ($validation->isValid()) {

            $user = $dao->login([
                'email' => $_POST['email']
            ]);
            
            if (password_verify($_POST['password'], $user['password'])) {

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'is_admin' => $user['is_admin'],
                    'is_recruiter' => $user['is_recruiter'],
                    'is_premium' => $user['is_premium']
                ];  
                
                $this->helper()->redirect();
            }

            $this->helper()->with('flash', [
                'class' => 'is-danger',
                'message' => 'Le mot de passe est incorrecte.'
            ])->redirect('login');            
        }

        $this->helper()->withErrors($validation->errors)->redirect('login');
    }

    public function getRegister()
    {
        $this->render("auth/register");
    }

    public function postRegister()
    {        
        $dao = new DAOAuth();

        $validation = new Validation($_POST, $dao);

        $validation->field('email', 'e-mail')->notEmpty()->isEmail()->isUnique('users');
        $validation->field('firstname', 'prénom')->notEmpty();
        $validation->field('lastname', 'nom de famille')->notEmpty();
        $validation->field('password', 'mot de passe')->notEmpty()->same('repeat_password', 'confirmation du mot de passe');
        $validation->field('repeat_password', 'confirmation du mot de passe')->notEmpty();
        $validation->field('is_recruiter', 'recruteur')->isRecruiter();

        if ($validation->isValid()) {
            
            $register = $dao->register([
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'is_recruiter' => (int)$_POST['is_recruiter'],
            ]);

            if ($register) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous pouvez maintenant vous connecter !'
                ])->redirect('login');
            }
        }
        
        $this->helper()->withErrors($validation->errors)->redirect('register');
    }

    public function logout()
    {
        unset($_SESSION['user']);

        $this->helper()->with('flash', [
            'class' => 'is-success',
            'message' => 'Vous avez bien été déconnecter.'
        ])->redirect('login');
    }
}
