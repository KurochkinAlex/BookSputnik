<?php
abstract class Controller 
{
    protected $view;
    
    public function __construct() 
    {
        $this->view = new View();
    }
    abstract public function actionIndex();
}