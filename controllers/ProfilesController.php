<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

class ProfilesController extends Controller 
{
    public function getProfile() 
    {        
        $this->render('profiles/profile'); 
    }

    public function postProfile()
    {
       
    }
}