<?php
class ControllerMain extends Controller 
{
    public function actionIndex() 
    {
        $model = new ModelMain();
        $results = $model->getCategories();
        $data = "";
        foreach ($results as $value) {
            $data .= $value["id"] ." - " . $value["category_name"] . "<br>";
        }
        return $this->view->getContent("viewTemplate", "viewMain", $data);
    }
}