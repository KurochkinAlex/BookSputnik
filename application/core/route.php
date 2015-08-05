<?php
final class Route 
{
    public function getStart() 
    {
        // Create the base part of routes; 
        $controllerName = "Main";
        $actionName = "Index";
        $routes = explode("/", $_SERVER["REQUEST_URI"]);
        if (!empty($routes[4])) {
            $controllerName = $routes[4];
        }
        if (!empty($routes[5])) {
            $actionName = $routes[5];
        }
        
        //add prefixes
        $modelName = "model" . ucfirst($controllerName);
        $controllerName = "controller" . ucfirst($controllerName);
        $action = "action" . ucfirst($actionName);
        
        //work with model and establish connect with a controller
        $modelFile = "application/models/" . $controllerName . ".php";
        $controllerFile = "application/controllers/" . $controllerName . ".php";
        if (file_exists($modelFile)) {
            include $modelFile;
        }
        if (file_exists($controllerFile)) {
            require $controllerFile;
        } else {
            Route::error404();
        }
        
        //add the class of controller
        $controller = new $controllerName();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::error404();
        }
    }
    
    public function error404() 
    {
        Header("Location: ./404");
    }
}
?>
