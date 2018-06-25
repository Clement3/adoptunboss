<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;
use BWB\Framework\mvc\dao\DAOUser;

class AdminController extends Controller 
{

    public function __construct()
    {
        if (!$this->helper()->is_admin()) {
            $this->helper()->redirect();
        }
    }

    public function dashboard()
    {
        $daoUser = new DAOUser();

        $this->render('admin/dashboard', [
            'users' => $daoUser->getAll()
        ]);
    }
}