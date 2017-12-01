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
