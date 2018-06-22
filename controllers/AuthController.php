<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOAuth;
use BWB\Framework\mvc\Validation;

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

        $names = [
            'email' => 'e-mail',
            'password' => 'mot de passe'
        ];

        $validation = new Validation($_POST, $names, $dao);

        $validation->field('email')->notEmpty()->isEmail()->exist('users');
        $validation->field('password')->notEmpty();

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

        $names = [
            'email' => 'e-mail',
            'firstname' => 'prénom',
            'lastname' => 'nom de famille',
            'password' => 'mot de passe',
            'repeat_password' => 'confirmer le mot de passe',
            'is_recruiter' => 'recruteur',
        ];

        $validation = new Validation($_POST, $names, $dao);

        $validation->field('email')->notEmpty()->isEmail()->isUnique('users');
        $validation->field('firstname')->notEmpty();
        $validation->field('lastname')->notEmpty();
        $validation->field('password')->notEmpty()->same('repeat_password');
        $validation->field('repeat_password')->notEmpty();
        $validation->field('is_recruiter')->isRecruiter();

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
