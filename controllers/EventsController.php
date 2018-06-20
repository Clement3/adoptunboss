<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;

Class EventsController extends Controller{

    public function index()
    {
        $dao = new DAOEvent();
        $data = array("data" => $dao->getAll());
        $this->render('events/index', $data);
    }

    public function show() {

    }

    public function edit(){

    }

    public function update(){

    }

    public function create() {

    }

    public function store() {

    }

    public function delete() {

    }
}