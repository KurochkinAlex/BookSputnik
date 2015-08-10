<?php
class ModelMain extends Model 
{
    public function getCategories() 
    {
        $results = $this->db->select(array("id", "category_name"), "categories", "`id`=?", array("2"));
        $data = $this->getData($results);
        return $data;
    }
}