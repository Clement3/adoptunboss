<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOSkill;
use BWB\Framework\mvc\Validation;

Class SkillsController extends Controller
{
    private $dao;

    public function __construct()
    {
        if (!$this->helper()->is_admin()) {
            $this->helper()->redirect();
        }

        $this->dao = new DAOSkill();
    }

    public function index()
    {
        $this->render('skills/index', [
            'skills' => $this->dao->getAll()
        ]);
    }

    public function create()
    {
        $this->render('skills/create');
    }

    public function store()
    {
        $names = [
            'name' => 'nom'
        ];

        $validation = new Validation($_POST, $names, $this->dao);

        $validation->field('name')->notEmpty()->isUnique('skills');

        if ($validation->isValid()) {

            $skill = $this->dao->create([
                'name' => $_POST['name']
            ]);

            if ($skill) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'La compétence à bien été ajouté !'
                ])->redirect('admin/skills');                
            }
            
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/skills/create');
    }

    public function edit($id)
    {
        $this->render('skills/edit', [
            'skill' => $this->dao->retrieve($id)
        ]);
    }

    public function update($id)
    {
        $names = [
            'name' => 'nom'
        ];

        $validation = new Validation($_POST, $names, $this->dao);

        $validation->field('name')->notEmpty()->isUnique('skills');

        if ($validation->isValid()) {
            $skill = $this->dao->update([
                'id' => $id,
                'name' => $_POST['name']
            ]);

            if ($skill) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'La compétence à bien été modifier !'
                ])->redirect('admin/skills/' . $id . '/edit');                  
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/skills/create');
    }

    public function delete($id)
    {
        $dao = $this->dao->delete($id);
        
        if ($dao) {
            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'La compétence à été supprimer.'
            ])->redirect('admin/skills');
        }
    }
}