<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOActivitie;
use BWB\Framework\mvc\Validation;

Class ActivitiesController extends Controller
{
    private $dao;

    public function __construct()
    {
        if (!$this->helper()->is_admin()) {
            $this->helper()->redirect();
        }

        $this->dao = new DAOActivitie();
    }

    public function index()
    {
        $this->render('activities/index', [
            'activities' => $this->dao->getAll()
        ]);
    }

    public function create()
    {
        $this->render('activities/create');
    }

    public function store()
    {
        $validation = new Validation($_POST, $this->dao);

        $validation->field('name', 'nom')->notEmpty()->isUnique('activities');

        if ($validation->isValid()) {

            $activities = $this->dao->create([
                'name' => $_POST['name']
            ]);

            if ($activities) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'L\'activité à bien été ajouté !'
                ])->redirect('admin/activities');                
            }
            
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/activities/create');
    }

    public function edit($id)
    {
        $this->render('activities/edit', [
            'activitie' => $this->dao->retrieve($id)
        ]);
    }

    public function update($id)
    {
        $validation = new Validation($_POST, $this->dao);

        $validation->field('name', 'nom')->notEmpty()->isUnique('activities');

        if ($validation->isValid()) {
            $activities = $this->dao->update([
                'id' => $id,
                'name' => $_POST['name']
            ]);

            if ($activities) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'L\'activité à bien été modifier !'
                ])->redirect('admin/activities/' . $id . '/edit');                  
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/activities/create');
    }

    public function delete($id)
    {
        $dao = $this->dao->delete($id);
        
        if ($dao) {
            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'L\'activité à bien été supprimer.'
            ])->redirect('admin/activities');
        }
    }
}