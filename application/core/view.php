<?php
class View 
{
    public function getContent($viewTemplate, $viewContent, $data = null) 
    {
        return "application/views/" . $viewTemplate . ".php";
    }
}