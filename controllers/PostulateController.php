<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPostulate;
use BWB\Framework\mvc\dao\DAOOffer;

class PostulateController extends Controller
{
    public function store($offerId)
    {
        $dao_postulate = new DAOPostulate();

        $data = [
            'users_id' => $_SESSION['user']['id'],
            'offers_id' => $offerId
        ];

        if ($dao_postulate->postulateNotExist($data)) {
            $dao_postulate->create($data);

            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'Vous avez bien postuler à cet offre !'
            ])->redirect('offer/'.$offerId);             
        }
    }

    public function accept($id)
    {
        $dao_offer = new DAOOffer();
        $dao_postulate = new DAOPostulate();

        $postulate = $dao_postulate->retrieve($id);

        if ($postulate) {
            $offer = $dao_offer->retrieve($postulate['offers_id']);

            if ($offer['users_id'] === $_SESSION['user']['id']) {
                $dao_postulate->acceptCandidate([
                    'users_id' => $postulate['users_id'],
                    'offers_id' => $offer['id']
                ]);
    
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous pouvez maintenant chatter avec le candidat !'
                ])->redirect('dashboard');              
            }            
        }
    }
}