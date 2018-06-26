<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;

Class EventsController extends Controller
{

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

    public function edit($id){
        $dao = new DAOEvent();
        $data = array("event" =>$dao->retrieve($id));
        $this->render('events/edit', $data);
    }

    public function update(){
        
        $dao = new DAOEvent(); 
        $UpdateEvent = [
            "id" => $id,
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "content" => $_POST["content"],
            "start_date" => $_POST["start_date"],
            "end_date" => $_POST["end_date"],
        ];
        $dao->update($UpdateEvent);
        header('Location: /events');
        
    }

    public function create() {
        $this->render('events/create');
        header('Location: /events');
    }

    public function store() {
        $dao = new DAOEvent();
        $newEvent = [
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "content" => $_POST["content"],
            "start_date" => $_POST["start_date"],
            "end_date" => $_POST["end_date"],
        ];
        $data = array("event" =>$dao->store($newEvent));
        header('Location: /events');
    }

    public function delete($id) {
        $dao = new DAOEvent();
        $data = array("event" => $dao->delete($id));
        $this->render('events/delete', $data);
        header('Location: /events');
    }
}