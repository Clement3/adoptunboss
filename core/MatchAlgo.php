<?php 

namespace BWB\Framework\mvc;

class MatchAlgo 
{
    private $profile;
    private $offers;
    private $offer;
    private $indice = 0;
    private $dao_skill;
    private $dao_match;

    public function __construct(Array $profile, Array $offers, Object $dao_skill, Object $dao_match)
    {
        $this->profile = $profile;
        $this->offers = $offers;
        $this->dao_skill = $dao_skill;
        $this->dao_match = $dao_match;
    }

    public function execute()
    {
        foreach ($this->offers as $offer) {
            $this->offer = $offer;
            // Activité [Strict]
            if ($this->activity()) {
                // Type de contrat [Strict]
                if ($this->employment()) {
                    $this->salary()->experience()->radius()->skills()->period();

                    if ($this->indice >= 60) {
                        $this->dao_match->create([
                            'offers_id' => $this->offer['id'],
                            'users_id' => $this->profile['users_id'],
                            'indice' => $this->indice
                        ]);

                        $this->indice = 0;
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
        $profile = (int)$this->profile['salary'];
        $offer = round((int)($this->offer['salary_min'] + $this->offer['salary_max']) / 2);

        $this->braindead($profile, $offer);

        return $this;
    }

    private function experience()
    {
        $profile = (int)$this->profile['experience'];
        $offer = (int)$this->offer['experience'];

        $this->braindead($profile, $offer);

        return $this;
    }

    private function radius()
    {
        $distance = $this->distance(
            round((float)$this->profile['latitude'], 6), 
            round((float)$this->profile['longitude'], 6),
            round((float)$this->offer['latitude'], 6),
            round((float)$this->offer['longitude'], 6)
        );

        if ($distance <= $this->profile['radius']) {
            $this->indice += 20;
        } else {
            // A tester
            $this->braindead($this->profile['radius'], $distance);
        }

        return $this;
    }

    private function skills()
    {
        $skills = $this->dao_skill->allSkillsForProfile($this->profile['id']);

        $indice = 0;

        foreach ($skills as $skill) {
            if ($this->dao_skill->skillsSameAsOffer($this->offer['id'], $skill['id'])) {
                $indice++;
            }
        }

        if (count($skills) === $indice || count($skills) === 0) {
            $this->indice += 20;
        } else {
            $this->braindead($indice, count($skills));
        }

        return $this;
    }

    private function period()
    {
        $profile = (int)$this->profile['period'];
        $offer = (int)$this->offer['period'];

        if ($profile > 0) {
            $this->braindead($profile, $offer);
        } else {
            $this->indice += 20;
        }

        return $this;
    }

    private function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earth_radius = 6378137;

        $a = (deg2rad($lng2) - deg2rad($lng1)) / 2;
        $b = (deg2rad($lat2) - deg2rad($lat1)) / 2;

        $c = (sin($b) * sin($b)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * (sin($a) * sin($a));
        $d = 2 * atan2(sqrt($c), sqrt(1 - $c));

        return ($earth_radius * $d);
    }

    private function distance($lat1, $lng1, $lat2, $lng2)
    {
        return (int)(round($this->getDistance($lat1, $lng1, $lat2, $lng2) / 1000, 3));
    }

    private function braindead($profile, $offer)
    {
        $a = (int)$profile;
        $b = (int)$offer;

        $calcul = abs(($a - $b) / $b * 100);
        
        $math = (int)$calcul;

        $indice = 21;

        for ($i = 0; $i <= 100; $i+=5) {
            $indice--;
            if ($math >= $i && $math <= $i+5) {
                $this->indice += $indice;
                break;
            }
        }  
    }
}