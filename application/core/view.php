<?php
class View 
{
    public function getContent($viewTemplate, $viewContent, $data = null) 
    {
        $viewContent = "application/views/" . $viewContent . ".php" ;
        include "application/views/" . $viewTemplate . ".php";
    }
}