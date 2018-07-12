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

    public function show($id)
    {
        $dao = new DAONews();

        $this->render('news/show', [
            'new' => $dao->retrieve($id)
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
                    ])->redirect('admin/news/'. $id .'/edit');
                }
            }

            $this->helper()->withErrors($validation->errors)->redirect('admin/news/'. $id .'/edit');
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

                $dao->create([
                    'title' => $_POST['title'],
                    'short_content' => $_POST['short_content'],
                    'content' => $_POST['content']
                ]);

                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous avez bien créer une nouvelle actualité.'
                ])->redirect('admin/news');
            }

            $this->helper()->withErrors($validation->errors)->redirect('admin/news/create');            
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
            ])->redirect('admin/news');            
        }
    }

    public function adminNews() 
    {
        if ($this->helper()->is_admin()) {
            $dao = new DAONews();
        
            $this->render('news/admin_news', [
                'news' => $dao->getAll()
            ]);
        }
    }
}
