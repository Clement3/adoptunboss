<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\Validation;

class UsersController extends Controller 
{
    private $dao_user;

    public function __construct()
    {
        if (!$this->helper()->is_auth()) {
            $this->helper()->redirect('login');
        }

        $this->dao_user = new DAOUser();
    }

    public function dashboard()
    {
        $this->render('users/dashboard', [
            'users' => $this->dao_user->getAll()
        ]);
    }

    public function getSettings()
    {
        $this->render('users/settings', [
            'user' => $this->dao_user->retrieve($_SESSION['user']['id'])
        ]);        
    }

    public function postSettings()
    {
        $names = [
            'email' => 'e-mail',
            'firstname' => 'prénom',
            'lastname' => 'nom de famille',
            'zip_code' => 'code postal',
            'birthday' => 'date de naissance',
            'phone' => 'téléphone'
        ];

        $validation = new Validation($_POST, $names, $this->dao_user);

        $validation->field('email')->isEmail();

        if ($validation->isValid()) {
            
            $request = $this->dao_user->update([
                'id' => $_SESSION['user']['id'],
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'zip_code' => $_POST['zip_code'],
            ]);
                
            if ($request) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vos paramètres on bien été modifier.'
                ])->redirect('settings');
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('settings');
    }
}