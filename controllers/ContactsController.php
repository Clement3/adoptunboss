<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOContact;
use BWB\Framework\mvc\Validation;

Class ContactsController extends Controller
{
    private $dao;

    public function __construct()
    {
        $this->dao = new DAOContact();
    }

    public function index()
    {
        $this->render('contacts/index', [
            'contacts' => $this->dao->getAll()
        ]);
    }

    public function create()
    {
        $this->render('contacts/create');
    }

    public function store() 
    {
        $validation = new Validation($_POST, $this->dao);

        $validation->field('title', 'objet')->notEmpty();
        $validation->field('full_name', 'nom complet')->notEmpty();
        $validation->field('email', 'e-mail')->notEmpty()->isEmail();
        $validation->field('content', 'description')->notEmpty();

        if ($validation->isValid()) {

            $contact = $this->dao->create([
                'title' => $_POST['title'],
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'content' => $_POST['content']
            ]);

            if ($contact) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Votre demande de contact à bien été envoyer !'
                ])->redirect('contact');
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect('contact');
    }

    public function delete($id)
    {
        $contact = $this->dao->delete($id);

        $this->helper()->with('flash', [
            'class' => 'is-success',
            'message' => 'La demande de contact à bien été supprimer !'
        ])->redirect('admin/contacts');        
    }

    public function getReply($id)
    {
        $this->render('contacts/reply', [
            'contact' => $this->dao->retrieve($id)
        ]);
    }

    public function postReply($id)
    {

    }
}
