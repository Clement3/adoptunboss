<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\Validation;
use BWB\Framework\mvc\dao\DAONews;

Class NewsController extends Controller{
    
    //affiche toutes les news
    public function index()
    {
        $dao = new DAONews();

        $this->render('news/index', [
            'news' => $dao->getAll()
        ]);
    }

    //permet d'afficher le formulaire de modification des news
    public function edit($id)
    {
        if ($this->helper()->is_admin()) {

            $dao = new DAONews();

            $this->render('news/edit', [
                'new' => $dao->retrieve($id)
            ]);

        }
    }

    //met a jour une new
    public function update($id)
    {
        if ($this->helper()->is_admin()) {

            $dao = new DAONews();

            $validation = new Validation($_POST, $dao);

            $validation->field('title', 'titre')->notEmpty();
            $validation->field('content', 'contenu')->notEmpty();
            $validation->field('short_content', 'petit contenu')->notEmpty();

            if ($validation->isValid()) {

                $update = $dao->update([
                    'id' => $id,
                    'title' => $_POST['title'],
                    'short_content' => $_POST['short_content'],
                    'content' => $_POST['content']
                ]);

                if ($update) {
                    $this->helper()->with('flash', [
                        'class' => 'is-success',
                        'message' => 'Cet actualité à bien été modifier.'
                    ])->redirect('news/'. $id .'/edit');
                }
            }

            $this->helper()->withErrors($validation->errors)->redirect('news/'. $id .'/edit');
        }
    }

    //affiche le formulaire de creation
    public function create() 
    {
        if ($this->helper()->is_admin()) {

            $this->render('news/create');
        }
    }

    //permet de creer une new dans la BDD
    public function store() 
    {
        if ($this->helper()->is_admin()) {
            $dao = new DAONews();

            $validation = new Validation($_POST, $dao);

            $validation->field('title', 'titre')->notEmpty();
            $validation->field('content', 'contenu')->notEmpty();
            $validation->field('short_content', 'petit contenu')->notEmpty();

            if ($validation->isValid()) {

                $store = $dao->create([
                    'title' => $_POST['title'],
                    'short_content' => $_POST['short_content'],
                    'content' => $_POST['content']
                ]);

                if ($store) {
                    $this->helper()->with('flash', [
                        'class' => 'is-success',
                        'message' => 'Cet actualité à bien été modifier.'
                    ])->redirect('news');
                }
            }

            $this->helper()->withErrors($validation->errors)->redirect('news');            
        }
    }

    //supprime une new
    public function delete($id) 
    {
        if ($this->helper()->is_admin()) {

            $dao = new DAONews();
            $dao->delete($id);

            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'Cet actualité à été supprimer avec succès.'
            ])->redirect('news');            
        }
    }
}
