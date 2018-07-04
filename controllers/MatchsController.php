<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOOffer;
use BWB\Framework\mvc\dao\DAOProfile;
use BWB\Framework\mvc\MatchAlgo;

class MatchsController extends Controller
{
    public function __construct()
    {
        if (!$this->helper()->is_auth()) {
            $this->helper()->with('flash', [
                'class' => 'is-danger',
                'message' => 'Vous devez être connecté !'
            ])->redirect('login');             
        }
    }

    public function index()
    {
        $dao_offer = new DAOOffer();
        $dao_profile = new DAOProfile();

        $offers = $dao_offer->getAll();
        $profile = $dao_profile->retrieve($_SESSION['user']['id']);

        $algo = new MatchAlgo($profile, $offers);

        $algo->execute();
        
        return var_dump($algo->period());

    }
}