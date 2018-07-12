<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOOffer;
use BWB\Framework\mvc\dao\DAOEmployment;
use BWB\Framework\mvc\dao\DAOActivitie;
use BWB\Framework\mvc\Validation;

Class OffersController extends Controller 
{
    public function index()
    {
        $dao = new DAOOffer();
    
        if ($this->helper()->is_admin()) {
            $this->render('offers/index', [
                'offers' => $dao->getAll()
            ]);   
        } else {
            if ($this->helper()->is_recruiter()) {
                $this->render('offers/index', [
                    'offers' => $dao->getAllByUserId($_SESSION['user']['id'])
                ]);            
            } 
        }      
    }

    public function show($id) 
    {
        $dao = new DAOOffer();

        $this->render('offers/show', [
            'offer' => $dao->retrieve($id),
            'skills' => $dao->getSkillsByOfferId($id)
        ]);
    }

    public function edit($id)
    {
        $dao = new DAOOffer();
        $dao_employments = new DAOEmployment();
        $dao_activities = new DAOActivitie();

        $this->render('offers/edit', [
            'offer' => $dao->retrieve($id),
            'employments' => $dao_employments->getAll(),
            'activities' => $dao_activities->getAll()
        ]);
    }

    public function update($id)
    {  
        $dao = new DAOOffer();

        $validation  = new Validation($_POST, $dao);

        $validation->field('title', 'titre')->notEmpty();
        $validation->field('content', 'contenu')->notEmpty();
        $validation->field('salary_min', 'salaire min')->notEmpty();
        $validation->field('salary_max', 'salaire max')->notEmpty();
        $validation->field('place', 'localisation')->notEmpty();
        $validation->field('employment', 'type de contrat')->notEmpty();
        $validation->field('activitie', 'activitie')->notEmpty();
        $validation->field('skills', 'compétences')->notEmpty();
        $validation->field('lat', 'latitude')->notEmpty();
        $validation->field('lng', 'longitude')->notEmpty();
        $validation->field('exp', 'experience')->notEmpty();

        if ($validation->isValid()) {
            $offer = $dao->update([
                'id' =>  $id,
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'salary_min' => $_POST['salary_min'],
                'salary_max' => $_POST['salary_max'],
                'experience' => $_POST['exp'],
                'period' => $_POST['period'],
                'place' => $_POST['place'],
                'latitude' => $_POST['lat'],
                'longitude' => $_POST['lng'],
                'skills' => $_POST['skills'],
                'activities_id' => $_POST['activitie'],
                'employments_id' => $_POST['employment']
            ]);

            if ($offer) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous avez bien éditer l\'offre'
                ])->redirect('offers/' . $id . '/edit');     
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('offers/'.$id.'/edit');
    }

    public function create() 
    {
        $dao_employments = new DAOEmployment();
        $dao_activities = new DAOActivitie();

        $this->render('offers/create', [
            'employments' => $dao_employments->getAll(),
            'activities' => $dao_activities->getAll()
        ]);
    }

    public function store() 
    {                
        $dao = new DAOOffer();

        $validation  = new Validation($_POST, $dao);

        $validation->field('title', 'titre')->notEmpty();
        $validation->field('content', 'contenu')->notEmpty();
        $validation->field('salary_min', 'salaire min')->notEmpty();
        $validation->field('salary_max', 'salaire max')->notEmpty();
        $validation->field('place', 'localisation')->notEmpty();
        $validation->field('employment', 'type de contrat')->notEmpty();
        $validation->field('activitie', 'activitie')->notEmpty();
        $validation->field('skills', 'compétences')->notEmpty();
        $validation->field('lat', 'latitude')->notEmpty();
        $validation->field('lng', 'longitude')->notEmpty();
        $validation->field('exp', 'experience')->notEmpty();
        
        if ($validation->isValid()) {

            $offer = $dao->create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'salary_min' => $_POST['salary_min'],
                'salary_max' => $_POST['salary_max'],
                'users_id' => $_SESSION['user']['id'],
                'activities_id' => $_POST['activitie'],
                'employments_id' => $_POST['employment'],
                'skills' => $_POST['skills'],
                'latitude' => $_POST['lat'],
                'longitude' => $_POST['lng'],
                'experience' => $_POST['exp'],
                'place' => $_POST['place']
            ]);
            
            if ($offer) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'L\'offre à bien été ajouté !'
                ])->redirect('offers');   
            }
        }
        
        $this->helper()->withErrors($validation->errors)->redirect('offers/create');
    }

    public function delete($id) 
    {
        $dao = new DAOOffer();

        if ($this->helper()->is_auth()) {
            $offer = $dao->retrieve($id);

            if (!empty($offer) && $offer['user_id'] === $_SESSION['user']['id'] || $this->helper()->is_admin()) {
                $dao->delete($id);

                if ($this->helper()->is_admin()) {
                    $this->helper()->with('flash', [
                        'class' => 'is-success',
                        'message' => 'L\'offre à bien été supprimer !'
                    ])->redirect('admin/offers');                      
                }

                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'L\'offre à bien été supprimer !'
                ])->redirect('offers');                   
            }
        }
    }

    public function views()
    {
        $dao = new DAOOffer();

        $this->render('offers/views', [
            'offers' => $dao->getAll()
        ]);      
    }
}