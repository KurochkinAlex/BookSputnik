<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $model = new ModelMain();
        $data = array();
        #$data["select"] = $model->getCategories(array("category_name"), "categories");
        return $this->view->getContent("viewTemplate", "viewMain", $data);
        //$data["select"] = $model->getCategories(array("category_name"), "categories");
        return $this->view->getContent("viewTemplate", "viewMain_page", $data);
    }
}