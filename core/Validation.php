<?php 

namespace BWB\Framework\mvc;

class Validation {

    public $errors = [];
    private $post = [];
    private $field;
	private $field_name;
    private $dao;

    public function __construct(Array $post, $dao = null) {
        $this->post = $post;
        $this->dao = $dao;
    }
    
    /**
     * On défini le champ sur lequel la validation fonctionnera
     * @param string $field
	 * @param string $field_name
     */
    public function field(String $field, String $field_name)
    {
        $this->field = $field;
		$this->field_name = $field_name;
		
        return $this;
    }

    /**
     * Si la valeur d'un champ existe dans la base de donnée
     * @param string $table
     */
    public function exist(String $table)
    {
        if ($this->dao->exist($table, $this->field, $this->post[$this->field])) {
            return $this;
        }
        
        $this->errors[] = 'La valeur du champ '. $this->field_name .' n\'existe pas dans notre base de données.';

        return $this;        
    }

    /**
     * Si la valeur d'un champ n'est pas vide
     */
    public function notEmpty()
    {
        if (isset($this->post[$this->field]) && !empty($this->post[$this->field])) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' ne peut être vide.';

        return $this;
    }

    /**
     * Si la valeur du champ e-mail est bien un e-mail
     */
    public function isEmail()
    {
        if (filter_var($this->post[$this->field], FILTER_VALIDATE_EMAIL)) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' n\'est pas valide.';

        return $this;
    }

    /**
     * Si un champ est unique
     * @param string $table
     */
    public function isUnique(String $table)
    {
        if ($this->dao->unique($table, $this->field, $this->post[$this->field])) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' doit être unique.';

        return $this;
    }

    /**
     * Si la valeur d'un champ à une longueur minimun
     * @param int $min
     */
    public function min(Int $min)
    {
        if (strlen($this->post[$this->field]) >= $min) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' doit faire minimun '. $min .' caractères.';

        return $this;
    }

    /**
     * Si la valeur d'un champ à une longueur maximun
     * @param int $max
     */
    public function max(Int $max)
    {
        if (strlen($this->post[$this->field]) <= $max) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' doit faire maximun '. $max .' caractères.';

        return $this;
    }
    
    /**
     * Si la valeur d'un champ est égale à la valeur d'un autre champ
     * @param string $field
	 * @param string $field_name
     */
    public function same(String $field, String $field_name)
    {
        if ($this->post[$field] === $this->post[$field]) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' doit être le même que le champ '. $field_name;

        return $this;
    }

    public function isInt()
    {
        if (isset($this->post[$this->field]) && is_numeric($this->post[$this->field])) {
            return $this;
        }

        $this->error[] = 'Le champ ' . $this->field_name . ' doit être de type numéric.';

        return $this;
    }

    /**
     * Si le champ est un boolean
     */
    public function isRecruiter()
    {
        $validate = [0, 1];

        if (in_array((int)$this->post[$this->field], $validate)) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->field_name .' doit être vrai ou faux.';

        return $this;
    }

    /**
     * Si il y à aucune erreur on continue
     * @return bool
     */
    public function isValid(): Bool
    {
        return empty($this->errors) || count($this->errors) <= 0;
    }
}