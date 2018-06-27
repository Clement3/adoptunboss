<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;
use BWB\Framework\mvc\dao\DAONews;

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
        $dao_news = new DAONews();

        $this->render('admin/dashboard', [
            'news' => $dao_news->getAll()
        ]);
    }
}