<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;

class BookmarksController extends Controller 
{
    public function __construct()
    {
        if (!$this->helper()->is_auth()) {
            $this->helper()->with('flash', [
                'class' => 'is-danger',
                'message' => 'Vous devez être connecté !'
            ])->redirect('login'); 
        }
    }
    
    public function create()
    {

    }

    public function delete()
    {

    }
}