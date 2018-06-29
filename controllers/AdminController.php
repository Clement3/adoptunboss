<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Helper;
use BWB\Framework\mvc\dao\DAONews;
use BWB\Framework\mvc\dao\DAOEvent;
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
        $dao_news = new DAONews();
        $dao_events = new DAOEvent();
        $dao_users = new DAOUser();

        $this->render('admin/dashboard', [
            'news' => $dao_news->getLastFive(),
            'events' => $dao_events->getLastFive(),
            'candidats' => $dao_users->getLastFiveCandidates(),
            'recruiters' => $dao_users->getLastFiveRecruiters()
        ]);
    }
}