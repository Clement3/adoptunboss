<?php 

namespace BWB\Framework\mvc;

class Validation {

    public $post = [];
    public $fields = [];
    public $errors = [];
    public $field;
    public $dao;

    public function __construct(Array $post, $fields, $dao = null) {
        $this->post = $post;
        $this->fields = $fields;
        $this->dao = $dao;
    }
    
    /**
     * On défini le champ sur lequel la validation fonctionnera
     * @param string $field
     */
    public function field(String $field)
    {
        $this->field = $field;

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

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' ne peut être vide.';

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

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' n\'est pas valide.';

        return $this;
    }

    /**
     * Si un champ est unique
     */
    public function isUnique()
    {
        if ($this->dao->isUnique($this->field, $this->post[$this->field]) <= 0) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' doit être unique.';

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

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' doit faire minimun '. $min .' caractères.';

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

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' doit faire maximun '. $max .' caractères.';

        return $this;
    }
    
    /**
     * Si la valeur d'un champ est égale à la valeur d'un autre champ
     * @param string $key
     */
    public function same(String $key)
    {
        if ($this->post[$this->field] === $this->post[$key]) {
            return $this;
        }

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' doit être le même que le champ '. $fields[$key];

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

        $this->errors[] = 'Le champ '. $this->fields[$this->field] .' doit être vrai ou faux.';

        return $this;
    }

    /**
     * Si il y à aucune erreur on continue
     * @return bool
     */
    public function isValid(): Bool
    {
        return empty($this->errors);
    }
}