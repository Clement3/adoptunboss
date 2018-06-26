<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAONews;
use BWB\Framework\mvc\dao\DAOEvent;

class PagesController extends Controller {

    public function home() 
    {
        $news = new DAONews();
        $events = new DAOEvent();

        $this->render('pages/home', [
            'news' => $news->limit(3),
            'events' => $events->limit(3)
        ]);
    }

    public function how()
    {
        $this->render('pages/how');
    }

    public function premium()
    {
        $this->render('pages/premium');
    }

    public function terms()
    {
        $this->render('pages/terms');
    }
}
