<?php

class routes
{
    public static function getRoutes()
    {
       
	   
        $route = new route();
        //this is the index.php route for GET
        //Specify the request method
        $route->http_method = 'GET';
        //specify the page.  index.php?page=index.  (controller name / method called
        $route->page = 'homepage';
        //specify the action that is in the URL to trigger this route index.php?page=index&action=show
        $route->action = 'show';
        //specify the name of the controller class that will contain the functions that deal with the requests
        $route->controller = 'homepageController';
        //specify the name of the method that is called, the method should be the same as the action
        $route->method = 'show';
        //this adds the route to the routes array.
        $routes[] = $route;
       
	   //this is the index.php route for POST
        //This is an example of the post for index
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'create';
        $route->page = 'homepage';
        $route->controller = 'homepageController';
        $route->method = 'create';
        $routes[] = $route;
        
		//This is an example of the post for tasks to show a task
        //GET METHOD index.php?page=tasks&action=show
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'show';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'show';
        $routes[] = $route;
        
        //GET METHOD index.php?page=tasks&action=all
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'all';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'all';
        $routes[] = $route;
       
	   //GET METHOD index.php?page=accounts&action=all
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'all';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'all';
        $routes[] = $route;
      
	  //GET METHOD index.php?page=accounts&action=show
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'show';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'show';
        $routes[] = $route;
		
		//create account
		 $route = new route();
        $route->http_method = 'GET';
        $route->action = 'createaccount';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'createaccount';
        $routes[] = $route;
       
	    $route = new route();
        $route->http_method = 'POST';
        $route->action = 'createaccount';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'createaccount';
        $routes[] = $route;
		
		
        //This goes in the login form action method
        //GET METHOD index.php?page=accounts&action=login
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'login';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'login';
        $routes[] = $route;
		
		
		 //Create new Task
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'createnewtask';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'createnewtask';
        $routes[] = $route;
       
	   $route = new route();
        $route->http_method = 'POST';
        $route->action = 'createnewtask';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'createnewtask';
        $routes[] = $route;

		
		//edit task
        $route = new route();
        $route->http_method = 'GET';
        $route->action = 'edittask';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'edittask';
        $routes[] = $route;
        
		$route = new route();
        $route->http_method = 'POST';
        $route->action = 'edittask';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'edittask';
        $routes[] = $route;
		
		
		
        //delete task
        $route = new route();
        $route->http_method = 'POST';
        $route->action = 'delete';
        $route->page = 'tasks';
        $route->controller = 'tasksController';
        $route->method = 'delete';
        $routes[] = $route;
        
		
		//This goes in the logout form action method
        //GET METHOD index.php?page=accounts&action=logout
		$route = new route();
        $route->http_method = 'GET';
        $route->action = 'logout';
        $route->page = 'accounts';
        $route->controller = 'accountsController';
        $route->method = 'logout';
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