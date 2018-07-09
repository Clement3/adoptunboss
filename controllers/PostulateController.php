<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOPostulate;

class PostulateController extends Controller
{
    public function index()
    {
        $daoPostulate = new DAOPostulate();
        $listPosulate = $daoPostulate->getAll();
        var_dump($listPosulate);
    }

    public function store($offerId)
    {
        $daoPostulate = new DAOPostulate();
        $existPostulate = $daoPostulate->postulateExist($_SESSION['user']['id']);
        var_dump($existPostulate);
        if ($existPostulate === false) {
            $daoPostulate->create([
                "users_id" => $_SESSION['user']['id'],
                "offers_id" => $offerId
            ]);
        } else {
            echo 'vous avez déja postuler !';
        }
    }

    public function acceptCandidate($offerId)
    {
        $daoPostulate = new DAOPostulate();
        $daoPostulate->acceptCandidate([
            "users_id" => 3,
            "offers_id" => $offerId
        ]);
    }
}