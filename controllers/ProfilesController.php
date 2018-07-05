<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEmployment;
use BWB\Framework\mvc\dao\DAOActivitie;
use BWB\Framework\mvc\dao\DAOProfile;
use BWB\Framework\mvc\Validation;

class ProfilesController extends Controller 
{
    public function __construct()
    {
        if (!$this->helper()->is_auth() && !$this->helper()->is_recruiter()) {
            $this->helper()->with('flash', [
                'class' => 'is-danger',
                'message' => 'Vous devez être connecté !'
            ])->redirect('login');  
        }
    }

    public function getProfile() 
    {        
        $dao_employments = new DAOEmployment();
        $dao_activities = new DAOActivitie();
        $dao_profile = new DAOProfile();

        $this->render('profiles/profile', [
            'employments' => $dao_employments->getAll(),
            'activities' => $dao_activities->getAll(),
            'profile' => $dao_profile->retrieve($_SESSION['user']['id'])
        ]); 
    }

    public function postProfile()
    {
        $dao_profile = new DAOProfile();

        $validation = new Validation($_POST);

        $validation->field('radius', 'rayon')->isInt();
        $validation->field('salary', 'salaire')->isInt();
        $validation->field('employment', 'type de contrat')->isInt();
        $validation->field('period', 'durée du contrat')->isInt();
        $validation->field('activitie', 'secteur d\'activité')->isInt();

        if ($validation->isValid()) {

            $fields = [
                'longitude' => $_POST['lng'],
                'latitude' => $_POST['lat'],
                'radius' => !empty($_POST['radius']) ? $_POST['radius'] : null,
                'salary' => !empty($_POST['salary']) ? $_POST['salary'] : null,
                'experience' => !empty($_POST['exp']) ? $_POST['exp'] : null,
                'period' => !empty($_POST['period']) ? $_POST['period'] : null,
                'users_id' => $_SESSION['user']['id'],
                'activities_id' => $_POST['activitie'],
                'employments_id' => $_POST['employment'],
                'skills' => $_POST['skills'],
                'place' => $_POST['place']
            ];
        
            // Si le profile existe
            if (isset($_POST['profile'])) {
                $status = $dao_profile->update($fields);
            } else {
                $status = $dao_profile->create($fields);
            }

            if ($status) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous pouvez maintenant match des offres !'
                ])->redirect('profile');  
            } 
        }

        $this->helper()->withErrors($validation->errors)->redirect('profile');
    }
}