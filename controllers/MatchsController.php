<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOOffer;
use BWB\Framework\mvc\dao\DAOProfile;
use BWB\Framework\mvc\dao\DAOSkill;
use BWB\Framework\mvc\dao\DAOMatch;
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
        $dao_skill = new DAOSkill();
        $dao_match = new DAOMatch();

        $offers = $dao_offer->getAll();
        $profile = $dao_profile->retrieve($_SESSION['user']['id']);

        $algo = new MatchAlgo($profile, $offers, $dao_skill, $dao_match);
        $algo->execute();

        $this->render('matchs/index', [
            'offers' => $dao_match->getAllBy($_SESSION['user']['id'])
        ]);
    }

    public function show($id)
    {
        $dao = new DAOMatch();

        $dao->view($id);

        $match = $dao->retrieve($id);
        
        if ($match) {
            $this->helper()->redirect('offer/'.$match['offers_id']);              
        }
    }
}