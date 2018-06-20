<?php

namespace BWB\Framework\mvc;

class Helpers {

    /**
     * Return l'url de base du site
     */
    public function base_url(String $action)
    {
        return "http://" . $_SERVER['SERVER_NAME'] . "/" . $action;
    }
}