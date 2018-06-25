<?php

namespace BWB\Framework\mvc;

class Paginate
{
    private $pdo;
    private $table;
    private $fields = [];    
    private $order;
    private $limit;
    private $count_entry;
    private $count_pages = null;
    private $data = [];


    public function __construct($pdo, String $table, ?Array $fields = null, String $order, Int $limit)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->fields = $fields;
        $this->order = $order;
        $this->limit = $limit;

        $this->numberPages();
    }

    public function paginate(Int $page = 1)
    {
        return [
            'data' => $this->data($page),
            'paginate' => [
                'total' => $this->count_entry,
                'pages' => $this->count_pages,
                'limit' => $this->limit,
                'page' => $page,
                'previous' => $page-1,
                'next' => $page+1
            ]
        ];
    }

    private function data(Int $page)
    {
        $sql = 'SELECT '. $this->fields() .' FROM '. $this->table .' ORDER BY '. $this->order .' DESC LIMIT '. ($page -1) * $this->limit .', '. $this->limit.'';
        $req = $this->pdo->query($sql);

        return $req->fetchAll();
    }

    private function numberPages()
    {
        if (is_null($this->count_pages)) {
            $sql = 'SELECT COUNT(*) FROM '. $this->table .'';
            $req = $this->pdo->prepare($sql);
            $req->execute();
            $result = $req->fetchColumn();

            $this->count_entry = $result;

            $pages = $result / $this->limit;

            if ($pages < 1) {
                $pages = 1;
            }

            $this->count_pages = $pages;
        }

        return $this->count_pages;
    }

    private function fields()
    {
        if (empty($this->fields)) {
            return '*';
        }

        $fields = '';

        foreach ($this->fields as $key => $field) {
            if ($key === count($this->fields) -1) {
                $fields .= $field .''; 
            } else {
                $fields .= $field .', ';
            }
        }

        return $fields;
    }
}
