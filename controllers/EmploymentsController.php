<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEmployment;
use BWB\Framework\mvc\Validation;

Class EmploymentsController extends Controller
{
    private $dao;

    public function __construct()
    {
        if (!$this->helper()->is_admin()) {
            $this->helper()->redirect();
        }

        $this->dao = new DAOEmployment();
    }

    public function index()
    {
        $this->render('employments/index', [
            'employments' => $this->dao->getAll()
        ]);
    }

    public function create()
    {
        $this->render('employments/create');
    }

    public function store()
    {
        $validation = new Validation($_POST, $this->dao);

        $validation->field('name', 'nom')->notEmpty()->isUnique('employments');

        if ($validation->isValid()) {

            $employments = $this->dao->create([
                'name' => $_POST['name']
            ]);

            if ($employments) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Le type de contrat à bien été ajouté !'
                ])->redirect('admin/employments');                
            }
            
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/employments/create');
    }

    public function edit($id)
    {
        $this->render('employments/edit', [
            'employment' => $this->dao->retrieve($id)
        ]);
    }

    public function update($id)
    {
        $validation = new Validation($_POST, $this->dao);

        $validation->field('name', 'nom')->notEmpty()->isUnique('employments');

        if ($validation->isValid()) {
            $employments = $this->dao->update([
                'id' => $id,
                'name' => $_POST['name']
            ]);

            if ($employments) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Le type de contrat à bien été modifier !'
                ])->redirect('admin/employments/' . $id . '/edit');                  
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/employments/create');
    }

    public function delete($id)
    {
        $dao = $this->dao->delete($id);
        
        if ($dao) {
            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'Le type de contrat à été supprimer.'
            ])->redirect('admin/employments');
        }
    }
}