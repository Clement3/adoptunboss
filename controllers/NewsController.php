<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAONews;

Class NewsController extends Controller{

    //affiche toutes les news
    public function index()
    {
        $dao = new DAONews();
        $data = array("data" => $dao->getAll());
        $this->render('news/index', $data);
    }

    //afficher juste une news
    public function show() {

    }
    //permet d'afficher le formulaire de modification des news
    public function edit($id){
        $dao = new DAONews();
        $data = array("data" => $dao->retrieve($id));
        $this->render('news/edit', $data);
    }

    //met a jour une new
    public function update($id){
        $dao = new DAONews();
        $updatedNews = [
            'id' => $id,
            'title' => $_POST['title'],
            'content' => $_POST['content']
            //faire gestion de l'image
        ];
        $dao->update($updatedNews);
    }

    //affiche le formulaire de creation
    public function create() {
        $dao = new DAONews();
        $createNews = [
            'id' => $id,
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ];

    }

    //permet de creer une new dans la BDD
    public function store() {

    }

    //supprime une new
    public function delete($id) {
        $dao = new DAONews();
        $dao->delete($id);
    }
}
