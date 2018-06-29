<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEmployment;
use BWB\Framework\mvc\dao\DAOActivitie;

class ProfilesController extends Controller 
{
    public function getProfile() 
    {        
        $dao_employments = new DAOEmployment();
        $dao_activities = new DAOActivitie();

        $this->render('profiles/profile', [
            'employments' => $dao_employments->getAll(),
            'activities' => $dao_activities->getAll()
        ]); 
    }

    public function postProfile()
    {
       
    }
}