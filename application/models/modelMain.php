<?php
class ModelMain extends Model 
{
    public function getCategories(array $fields, $tableName, $where = "", array $parameters = array(), $order = "", $up = true)
    {
        $results = $this->db->select($fields, $tableName, $where = "", $parameters = array(), $order = "", $up = true);
        $data = $this->getData($results);
        return $data;
    }
    
    public function insertCategories() 
    {
        return $this->db->insert(array("category_name", "inheritors"), "categories", array("Chekhov", "cherry orchard, the duel"));
    }
    
    public function updateCategories() 
    {
        return $this->db->update(array("category_name", "inheritors"), "categories", array("update", "inheritors"), "id = 9");
    }
    
    public function deleteCategories() 
    {
        return $this->db->delete("categories", "id = ?", array("9"));
    }
}