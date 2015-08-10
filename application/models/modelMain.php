<?php
class ModelMain extends Model 
{
    private function makeArrayToString(array $input) 
    {
        $output = "";
        foreach ($input as $value) {
            $output .= $value["id"] ." - " . $value["category_name"] . "<br>";
        }
        return $output;
    }
    
    public function getCategories() 
    {
        $results = $this->db->select(array("id", "category_name"), "categories");
        $results = $this->getData($results);
        $data = $this->makeArrayToString($results);
        return $data;
    }
}