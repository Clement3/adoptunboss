<?php 

namespace BWB\Framework\mvc;

class PrettyDate
{
    public function __construct()
    {
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, "fr_FR");
    }

    /**
     * Format une date
     * @param string $date
     */
    public function format(String $date)
    {
        $toString = date('j F Y', strtotime($date)). ' à '.date('h:i', strtotime($date));

        echo $toString;
    }

    /**
     * Format une date sans les heures, minutes
     * @param string $date
     */
    public function formatWithoutTime(String $date)
    {
        $toString = date('j F Y', strtotime($date));

        echo $toString;        
    }
}