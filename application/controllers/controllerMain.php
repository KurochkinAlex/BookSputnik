<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $this->view->getContent("viewTemplate", "viewMain");
    }
}