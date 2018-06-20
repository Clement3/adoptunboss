<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\models\TestModel;
use BWB\Framework\mvc\dao\DAOTest;

/**
 * Description of ViewController
 *
 */
class PagesController extends Controller {

    public function home() 
    {
        $this->render("home");
    }

    public function test()
    {
        $dao = new DAOTest();
        return var_dump($dao->getAll());
    }
}
