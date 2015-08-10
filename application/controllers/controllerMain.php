<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $model = new ModelMain();
        $data = $model->insertCategories();
        return $this->view->getContent("viewTemplate", "viewMain", $data);
    }
}