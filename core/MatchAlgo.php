<?php 

namespace BWB\Framework\mvc;

class MatchAlgo 
{
    public $profile;
    public $offers;
    private $offer;
    private $indice = 0;

    public function __construct(Array $profile, Array $offers)
    {
        $this->profile = $profile;
        $this->offers = $offers;
    }

    public function execute()
    {
        foreach ($this->offers as $offer) {
            $this->offer = $offer;
            // Activité [Strict]
            if ($this->activity()) {
                // Type de contrat [Strict]
                if ($this->employment()) {
                    if ($this->period()) {
                        return $this->indice;
                    }
                }
            }
        }
    }

    private function activity(): Bool
    {
        return $this->profile['activities_id'] === $this->offer['activities_id'];
    }

    private function employment(): Bool
    {
        return $this->profile['employments_id'] === $this->offer['employments_id'];
    }

    private function salary()
    {
        
    }

    private function experience()
    {

    }

    private function radius()
    {
        
    }

    private function skills()
    {

    }

    public function period()
    {
        $indice = 20;

        $a = $this->profile['period'];
        $b = $this->offer['period'];
        
        $inc = $b;
        $dec = $b;

        if ($a > 0) {
            for ($i = 1; $i <= 20; $i++) {
                var_dump('Mon indice :'. $indice);
                if ($indice > 1) {
                    if ($a === $b) {
                        $this->indice = +20;
    
                        return true;
                    }
                    
                    if ($dec > 0 || $inc < 20) {
                        if ($a === $dec-- || $a === $inc++) {
                            $this->indice = +$indice;   
        
                            return true;
                        }                    
                    }
    
                    $indice--;
                }
            }
        }
    }
}