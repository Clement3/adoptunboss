<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOSkill;
use BWB\Framework\mvc\dao\DAOActivitie;
use BWB\Framework\mvc\Validation;

Class SkillsController extends Controller
{
    private $dao_skill;
    private $dao_activitie;

    public function __construct()
    {
        if (!$this->helper()->is_admin()) {
            $this->helper()->redirect();
        }

        $this->dao_skill = new DAOSkill();
        $this->dao_activitie = new DAOActivitie(); 
    }

    public function index()
    {
        $this->render('skills/index', [
            'skills' => $this->dao_skill->getAll()
        ]);
    }

    public function create()
    {
        $this->render('skills/create', [
            'activities' => $this->dao_activitie->getAll()
        ]);
    }

    public function store()
    {        
        $validation = new Validation($_POST, $this->dao_skill);

        $validation->field('name', 'nom')->notEmpty()->isUnique('skills');
        $validation->field('activitie', 'activité')->notEmpty();

        if ($validation->isValid()) {

            $skill = $this->dao_skill->create([
                'name' => $_POST['name'],
                'activitie' => $_POST['activitie']
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
            'activities' => $this->dao_activitie->getAll(),
            'skill' => $this->dao_skill->retrieve($id)
        ]);
    }

    public function update($id)
    {
        $validation = new Validation($_POST, $this->dao_skill);

        $validation->field('name', 'nom')->notEmpty()->isUnique('skills');

        if ($validation->isValid()) {
            $skill = $this->dao_skill->update([
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
        $dao = $this->dao_skill->delete($id);
        
        if ($dao) {
            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'La compétence à été supprimer.'
            ])->redirect('admin/skills');
        }
    }
}