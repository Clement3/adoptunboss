<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;
use BWB\Framework\mvc\Validation;

Class EventsController extends Controller
{

    public function index()
    {
        $dao = new DAOEvent();

        $this->render('events/index', [
            'events' => $dao->getAll()
        ]);
    }

    public function show($id) 
    {
        $dao = new DAOEvent();

        $this->render('events/show', [
            'event' => $dao->retrieve($id)
        ]);
    }

    public function edit($id)
    {
        $dao = new DAOEvent();

        $this->render('events/edit', [
            'event' => $dao->retrieve($id)
        ]);
    }

    public function update($id)
    {
        $dao = new DAOEvent(); 

        $validation = new Validation($_POST, $dao);

        $validation->field('title','titre')->notEmpty()->isUnique('events')->max(50);
        $validation->field('description','description')->notEmpty()->max(4000);
        $validation->field('content','contenu')->notEmpty()->max(4000);
        
        if ($validation->isValid()) {
            $event = $dao->update([
                "id" => $id,
                "title" => $_POST["title"],
                "short_content" => $_POST["description"],
                "content" => $_POST["content"],
                "start_date" => $_POST["start_date"],
                "end_date" => $_POST["end_date"],
            ]);
            
            if ($event) {
                $this->helper()->with('flash', [
                    'class' => 'is-danger',
                    'message' => 'L\'évènement à bien été modifier !'
                ])->redirect('admin/events/' . $id . '/edit');        
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/events/' . $id . '/edit');  
    }

    public function create() 
    {
        $this->render('events/create');
    }

    public function store() 
    {
        $dao = new DAOEvent();

        $validation = new Validation($_POST, $dao);

        $validation->field('title','titre')->notEmpty()->isUnique('events')->max(50);
        $validation->field('description','description')->notEmpty()->max(4000);
        $validation->field('content','contenu')->notEmpty()->max(4000);
        
        if ($validation->isValid()) {
            $event = $dao->create([
                "title" => $_POST["title"],
                "short_content" => $_POST["description"],
                "content" => $_POST["content"],
                "start_date" => $_POST["start_date"],
                "end_date" => $_POST["end_date"],
            ]);
            
            if ($event) {
                $this->helper()->with('flash', [
                    'class' => 'is-danger',
                    'message' => 'L\'évènement à bien été créer !'
                ])->redirect('events');        
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('admin/events/create');
    }

    public function delete($id) 
    {
        $dao = new DAOEvent();

        $event = $dao->delete($id);

        if ($event) {
            $this->helper()->with('flash', [
                'class' => 'is-danger',
                'message' => 'L\'évènement à bien été créer !'
            ])->redirect('events');            
        }
    }
}