<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
//use this when you move my code into class files, i have not done this.
function my_autoloader($class)
{
    include 'classes/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');

$response = processRequest::createResponse();
class routes
{
    public static function getRoutes()
    {
        
        $route = new route();
        //Specify the request method
        $route->http_method = 'GET';
        //specify the page.  index.php?page=index.  (controller name / method called
        $route->page = 'index';
        //specify the action that is in the URL to trigger this route index.php?page=index&action=show
        $route->action = 'show';
        //specify the name of the controller class that will contain the functions that deal with the requests
        $route->controller = 'index';
        //specify the name of the method that is called, the method should be the same as the action
        $route->method = 'show';
        //this adds the route to the routes array.
        $routes[] = $route;
        //This is an examole of the post for index
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'create';
        $route->page = 'index';
        $route->controller = 'index';
        $route->method = 'create';
        $routes[] = $route;
        //This is an examole of the post for tasks to show a task
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'show';
        $route->page = 'tasks';
        $route->controller = 'tasks';
        $route->method = 'show';
        $routes[] = $route;
        //This is an examole of the post for tasks to list tasks.  See the action matches the method name.
        //you need to add routes for create, edit, and delete
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'list_task';
        $route->page = 'tasks';
        $route->controller = 'tasks';
        $route->method = 'list_task';
        $routes[] = $route;
        return $routes;
    }
}
//this is the route prototype object  you would make a factory to return this
class route
{
    public $page;
    public $action;
    public $method;
    public $controller;
}
class processRequest
{
    //this is the main function of the program to calculate the response to a get or post request
    public static function createResponse()
    {
        $requested_route = processRequest::getRequestedRoute();
        //This is an important function to look at, it determines which controller to use
        $controller_name = $requested_route->controller;
        //this determines the method to call for the controller
        $controller_method = $requested_route->method;
        //I use a static for the controller because it doesn't have any properties
        $controller_name::$controller_method();
    }
    //this function matches the request to the correct controller
    public static function getRequestedRoute()
    {
        //this is a helper function that needs to be improved because it does too much.  I will look for this in grading
        $request_method = request::getRequestMethod();
        $page = request::getPage();
        $action = request::getAction();
        echo 'Action: ' . $action . '</br>';
        echo 'Page: ' . $page . '</br>';
        echo 'Request Method: ' . $request_method . '</br>';
        //this gets the routes objects, you need to add routes to add pages and follow the template of the route specified
        $routes = routes::getRoutes();
        //this figures out which route matches the page being requested in the URL and returns it so that the controller and method can be called
        foreach ($routes as $route) {
            if ($route->page == $page && $route->http_method == $request_method && $route->action == $action) {
               return $route;
             }
        }
    }
}
//this is the controller class that you use to connect models with views and business logic
class controller
{
//this gets the HTML template for the application and accepts the model.  The model array can be used in the template
    static public function getTemplate($template, $data = NULL)
    {
        $template = 'pages/' . $template . '.php';
        //in your template you should use $data to access your array
        include $template;
    }
}
//this is the controller for the index page.

class index extends controller
{
    public static function show()
    {
        //this is the show method 
        $myTemplateData = array('site_name' => 'My Task Site');
       
        self::getTemplate('homepage', $myTemplateData);
    }
    public static function create()
    {
        
        print_r($_POST);
    }
}
//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasks extends controller
{
    public static function show()
    {
        $myTemplateData = array('site_name' => 'My Task Site', 'page_name' => 'task');
        self::getTemplate('tasks', $myTemplateData);
    }
    //to call the show function the url is index.php?page=task&action=list_task
    public static function list_task()
    {
        $myTemplateData = array('site_name' => 'My d Task Site', 'page_name' => 'task list');
        self::getTemplate('tasks', $myTemplateData);
    }
   
    //this is a function to create new tasks
    
    public static function create()
    {
        print_r($_POST);
    }
    //this is the function to edit records
    public static function edit()
    {
        print_r($_POST);
    }
    //this is the delete function.  
    public static function remove()
    {
        print_r($_POST);
    }
}
class request
{
    //this gets the request method to make it easier to use
    static public function getRequestMethod()
    {
        $request_method = $_SERVER['REQUEST_METHOD'];
        return $request_method;
    }
    //this gets determines the page
    static public function getPage()
    {
        //this sets the default page for the app to index
        $page = 'index';
        //this checks if page is set
        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
    }
    //this gets the action out of the URL
    static public function getAction()
    {
        //this is a litte code to help the homepage handle post requests if needed
        if (self::getRequestMethod() == 'POST') {
            $action = 'create';
        } else {
            $action = 'show';
        }
        if (!empty($_GET['action'])) {
            $action = $_GET['action'];
        }
        return $action;
    }
}
?>