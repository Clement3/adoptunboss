<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOPostulate;
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

    public function index()
    {
        if ($this->helper()->is_admin()) {

            $this->render('users/index', [
                'users' => $this->dao_user->getAll()
            ]);
        }
    }

    public function edit($id)
    {
        if ($this->helper()->is_admin()) {

            $this->render('users/edit', [
                'user' => $this->dao_user->retrieve($id)
            ]);
        }        
    }

    public function update($id)
    {
        if ($this->helper()->is_admin()) {
            
            $validation = new Validation($_POST, $this->dao_user);

            $validation->field('email', 'e-mail')->isEmail();
    
            if ($validation->isValid()) {
                
                $admin = 0;

                if ($_POST['is_admin'] === '1') {
                    $admin = 1;
                }

                $rank = 0;

                if ($_POST['rank'] === '1') {
                    $rank = 1;
                }

                $request = $this->dao_user->update([
                    'id' => $id,
                    'email' => $_POST['email'],
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'is_admin' => $admin,
                    'is_recruiter' => $rank
                ]);
                    
                if ($request) {
                    // Regenerate Session
                    $this->helper()->with('flash', [
                        'class' => 'is-success',
                        'message' => 'L\'utilisateur à bien été modifier.'
                    ])->redirect('admin/users/'. $id .'/edit');    
                }
            }
    
            $this->helper()->withErrors($validation->errors)->redirect('admin/users/'. $id .'/edit');            
        }
    }

    public function delete($id)
    {
        if ($this->helper()->is_admin()) {
            $user = $this->dao_user->delete($id);

            if ($user) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'L\'utilisateur à bien été supprimer.'
                ])->redirect('admin/users');
            }
        }
    }

    public function dashboard()
    {
        $dao_postulate = new DAOPostulate();
        $user = $_SESSION['user']['id'];

        $this->render('users/dashboard', [  
            'user' => $this->dao_user->retrieve($user),
            'postulates' => $this->helper()->is_recruiter() ? $dao_postulate->getAllPostulates($user) : $dao_postulate->getAllAccepted($user)
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
        $validation = new Validation($_POST, $this->dao_user);

        $validation->field('email', 'e-mail')->isEmail();

        if ($validation->isValid()) {
            
            $request = $this->dao_user->update([
                'id' => $_SESSION['user']['id'],
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
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