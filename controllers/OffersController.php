<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOOffer;
use BWB\Framework\mvc\dao\DAOSkill;
use BWB\Framework\mvc\Validation;

Class OffersController extends Controller 
{
    public function index()
    {
        $dao = new DAOOffer();
        $data = array("offers" => $dao->getAll());
        $this->render('offers/index', $data);
        // that send test data to DB
        /* for ($i = 0; $i < 10; $i++){
            $newOffer = [
                // ! les champs avec clefs etrangère sont à configurer une fois la bdd compète !
                'title' => "test",
                'content' => "contenu test",
                'zip_code' => 34500,
                'salary_min' => 1300,
                'salary_max' => 2400,
                'activities_id' => 1,
                'experience' => 5,
                'closed' => 0,
                'period' => 3,
                'users_id' => 2,
                'employments_id' => 1
            ];
            $dao->create($newOffer);
        }
        */
    }

    public function show($id) 
    {
      
    }

    public function edit($id)
    {
        $dao = new DAOOffer();
        $data = array("offer" => $dao->retrieve($id));
        $this->render('offers/edit', $data);
    }

    public function update($id)
    {  
        $dao = new DAOOffer();
        $updatedOffer = [
            'id' =>  $id,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'zip_code' => $_POST['zip_code'],
            'salary_min' => $_POST['salary_min'],
            'salary_max' => $_POST['salary_max'],
            'experience' => $_POST['experience'],
            'period' => $_POST['period'],
        ];
        $dao->update($updatedOffer);
        header('Location: /dashboard/offers');
    }

    public function create() 
    {
        $dao_skills = new DAOSkill();
        
        $this->render('offers/create', [
            'skills' => $dao_skills->getAll()
        ]);
    }

    public function store() 
    {        
        $dao = new DAOOffer();

        $names = [
            'title' => 'titre',
            'content' => 'contenu',
            'zip_code' => 'code postal',
            'salary_min' => 'salaire débutant',
            'salary_max' => 'salaire confirmé',
            'experience' => 'experience requise',
            'period' => 'durée du contrat',
        ];

        $validation  = new Validation($_POST, $names, $dao);

        $validation->field('title')->notEmpty();
        $validation->field('content')->notEmpty();
        $validation->field('zip_code')->notEmpty();
        $validation->field('salary_min')->notEmpty();
        $validation->field('salary_max')->notEmpty();

        if ($validation->isValid()) {
            $offer = [
                // ! les champs avec clefs etrangère sont à configurer une fois la bdd compète !
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'zip_code' => $_POST['zip_code'],
                'salary_min' => $_POST['salary_min'],
                'salary_max' => $_POST['salary_max'],
                'users_id' => $_SESSION['user']['id'],
                'activities_id' => 1,
                'employments_id' => 1,
                'skills' => $_POST['skills']
            ];

            var_dump($dao->create($offer));

        } else {
            $this->helper()->withErrors($validation->errors)->redirect('dashboard/offers');
        } 
    }

    public function delete($id) 
    {
        $dao = new DAOOffer();
        $dao->delete($id);
        header('Location: /dashboard/offers');
    }
}