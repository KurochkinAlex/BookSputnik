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
}