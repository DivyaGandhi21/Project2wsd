<?php

//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller
{
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show
    public static function show()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('show_task', $record);
    }
    //to call the show function the url is index.php?page=task&action=list_task
    public static function all()
    {
        $records = todos::findAll();
        session_start();
        $userID = $_SESSION['userID'];
        $records = todos::findTasksbyID($userID);
        self::getTemplate('all_tasks', $records);
    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    
    public static function create()
    {
        print_r($_POST);
    }
    //this is the function to view edit record form
    public static function edit()
    {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('edit_task', $record);
    }
    //this would be for the post for sending the task edit form
    public static function store()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->body = $_REQUEST['body'];
        $record->save();
        print_r($_POST);
    }
    //this is the delete function.  
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->delete();
        print_r($_POST);
    }
}
