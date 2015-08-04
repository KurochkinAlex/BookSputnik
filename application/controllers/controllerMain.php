<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        include $this->view->getContent("viewTemplate", "viewMain");
    }
}