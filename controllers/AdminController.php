<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;

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
        $this->render('admin/dashboard');
    }
}