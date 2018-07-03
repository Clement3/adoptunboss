<?php 

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOSkill;

class AjaxController extends Controller
{
    public function getSkills($id)
    {
        $dao = new DAOSkill();

        $skills = $dao->allSkillsByActivitieId($id);

        header('Content-Type: application/json');

        echo json_encode($skills);
    }

    public function getSkillsForOffer($id)
    {
        $dao = new DAOSkill();

        $skills = $dao->allSkillsForOffer($id);

        header('Content-Type: application/json');

        echo json_encode($skills);        
    }

    public function getSkillsForProfile($id)
    {
        $dao = new DAOSkill();

        $skills = $dao->allSkillsForProfile($id);

        header('Content-Type: application/json');

        echo json_encode($skills);   
    }
}