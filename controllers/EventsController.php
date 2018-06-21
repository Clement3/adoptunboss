<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;

Class EventsController extends Controller{

    public function index()
    {
        $dao = new DAOEvent();
        $data = array("events" => $dao->getAll());
        $this->render('events/index', $data);
    }

    public function show($id) {
        $dao = new DAOEvent();
        $data = array("event" => $dao->retrieve($id));
        $this->render('events/show', $data);
    }

    public function edit(){
        $this->render('events/edit');
    }

    public function update(){
        $this->render('events/update');
    }

    public function create() {
        $this->render('events/create');
    }

    public function store() {

    }

    public function delete() {
        $this->render('events/delete');
    }
}