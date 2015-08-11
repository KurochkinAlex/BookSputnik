<?php
class DataBase 
{
    public $user;
    public $psw;
    public $server;
    public $db;
    public $prefix;
    public $dsn;
    public $pdo;
    
    public function __construct() 
    {
        $this->user = Configuration::USER_LOGIN;
        $this->psw = Configuration::USER_PASSWORD;
        $this->server = Configuration::USER_SERVER;
        $this->db = Configuration::USER_DATABASE;
        $this->prefix = Configuration::DB_PREFIX;
        $this->dsn = "mysql:host=$this->server;dbname=$this->db";
        $this->pdo = new PDO($this->dsn, $this->user, $this->psw);
    }
    
    
    public function query($query) 
    {
        return $this->pdo->query($query);
    }
    
    public function select(array $fields, $tableName, $where = "", array $parameters = array(), $order = "", $up = true)
    {
        $tableName = $this->prefix . $tableName;
        $field = array();
        for ($i = 0; $i < count($fields); $i++) {
            if ($fields[$i] != "*") {
                $field[$i] = "`" . $fields[$i] . "`";
            } else {
                $field[$i] = $fields[$i]; 
            }
        }
        $fields = implode(",", $field);
        $query = "";
        $query .= "SELECT $fields FROM $tableName";
        if (strlen($where) > 0) {
            $query .= " WHERE $where";
            if (strlen($order) > 0) {
                $up = ($up) ? "asc" : "desc";
                $query .= " ORDER BY $order $up";
            }
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($parameters);
        } else {
            $stmt = $this->query($query);
        }
        return $stmt;
    }
    
    public function insert(array $fields, $tableName, array $values) 
    {
        $tableName = $this->prefix . $tableName;
        $query = "";
        $query .= "INSERT INTO $tableName SET " . $this->pdoSet($fields);
        $stmt = $this->pdo->prepare($query);
        $stmt = ($stmt->execute($values)) ? true : false;
        return $stmt;
    }
    
    public function update(array $fields, $tableName, array $values, $where) 
    {
        $tableName = "`" . $this->prefix . $tableName . "`";
        $query = "";
        $query .= "UPDATE $tableName SET " . $this->pdoSet($fields) . " WHERE $where";
        $stmt = $this->pdo->prepare($query);
        $stmt = ($stmt->execute($values)) ? true : false;
        return $stmt;
    }
    
    public function delete($tableName, $where, array $values) 
    {
        $tableName = "`" . $this->prefix . $tableName . "`";
        $query = "";
        $query = "DELETE FROM $tableName WHERE $where";
        $stmt = $this->pdo->prepare($query);
        $stmt = ($stmt->execute($values)) ? true : false;
        return $stmt;
    }
    
    public function truncate($tableName) 
    {
        $tableName = "`" . $this->prefix . $tableName . "`";
        $query = "";
        $query .= "TRUNCATE $tableName";
        $stmt = ($this->query($query)) ? true : false;
        return $stmt;
    }
    
    private function pdoSet(array $fields) 
    {
        $output = "";
        foreach ($fields as $field) {
            $output .= "`" . $field . "`" . " = ?, ";
        }
        return substr($output, 0, -2);
    }
}