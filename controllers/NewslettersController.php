<?php

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAONewsletter;
use BWB\Framework\mvc\Validation;

class NewslettersController extends Controller
{
    public function index()
    {
        if ($this->helper()->is_admin()) {
            $dao = new DAONewsletter();

            $this->render('newsletters/index', [
                'newsletters' => $dao->getAll()
            ]);
        }
    }

    public function store() 
    {
        $dao = new DAONewsletter();

        $validation = new Validation($_POST, $dao);

        $validation->field('email', 'e-mail')->notEmpty()->isUnique('newsletters');

        if ($validation->isValid()) {
            $newsletter = $dao->store([
                'email' => $_POST['email']
            ]);

            if ($newsletter) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous avez bien été inscrit dans la newsletter !'
                ])->redirect();
            }
        }

        $this->helper()->withErrors($validation->errors)->redirect();
    }

    public function delete($id)
    {
        if ($this->helper()->is_admin()) {

            $dao = new DAONewsletter();

            $newsletter = $dao->delete($id);   

            if ($newsletter) {
                $this->helper()->with('flash', [
                    'class' => 'is-success',
                    'message' => 'Vous avez bien supprimer cet e-mail de la newsletter'
                ])->redirect('admin/newsletters');
            }
        }
    }

    public function unsubscribe($email)
    {
        $dao = new DAONewsletter();

        $newsletter = $dao->unsubscribe($email);   

        if ($newsletter) {
            $this->helper()->with('flash', [
                'class' => 'is-success',
                'message' => 'Vous avez bien été supprimer de la newsletter'
            ])->redirect();
        }
    }
}