<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $model = new ModelMain();
        $data = array();
        $data["insert"] = $model->insertCategories();
        $data["select"] = $model->getCategories();
        return $this->view->getContent("viewTemplate", "viewMain", $data);
    }
}