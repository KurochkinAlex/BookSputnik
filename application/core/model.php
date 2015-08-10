<?php
abstract class Model 
{
    public $db;
    
    public function __construct() 
    {
        $this->db = new DataBase();
    }
    
    protected function getData($results) 
    {
        $data = array();
        $i = 0;
        while ($row = $results->fetch()) {
            $data[$i] = $row;
            $i++;
        }
        return $data;
    }
}