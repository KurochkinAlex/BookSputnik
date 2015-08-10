<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $model = new ModelMain();
        $data = $model->getCategories();
        return $this->view->getContent("viewTemplate", "viewMain", $data);
    }
}