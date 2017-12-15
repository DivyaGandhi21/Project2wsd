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
           if(key_exists('userID',$_SESSION)) {
               $userID = $_SESSION['userID'];
           } else {

               echo 'you must be logged in to view tasks';
           }
        $userID = $_SESSION['userID'];

        $records = todos::findTasksbyID($userID);
        
        self::getTemplate('all_tasks', $records);

    }
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks

    //you should check the notes on the project posted in moodle for how to use active record here

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
    public static function insert()
	{
		self::getTemplate('create_task');
	}
    //this would be for the post for sending the task edit form
    public static function store()
    {
$task = new todo();
$task->owneremail = $_POST['owneremail'];
print $_POST['owneremail'];
$task->ownerid = $_POST['ownerid'];
$task->createddate = $_POST['createddate'];
$task->duedate = $_POST['duedate'];
$task->message = $_POST['message'];
$task->isdone = $_POST['isdone'];
$task->save();
//self::getTemplate('all_tasks', $user);

header("Location: index.php?page=tasks&action=all");  
    }

    public static function save() {
        session_start();
        $task = new todo();

        $task->body = $_POST['body'];
        $task->ownerid = $_SESSION['userID'];
        $task->save();

    }

    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete()
    {
        $record = todos::findOne($_REQUEST['id']);
        $record->delete();
        print_r($_POST);

    }
	
	//this is to login, here is where you find the account and allow login or deny.
    
 


public static function login()
{
    //you will need to fix this so we can find users username.  YOu should add this method findUser to the accounts collection
    //when you add the method you need to look at my find one, you need to return the user object.
    //then you need to check the password and create the session if the password matches.
    //you might want to add something that handles if the password is invalid, you could add a page template and direct to that
    //after you login you can use the header function to forward the user to a page that displays their tasks.
    //        $record = accounts::findUser($_POST['email']);

    $user = accounts::findUserbyEmail($_REQUEST['email']);
   

    if ($user == FALSE) {
        echo 'user not found';
    } else {

        if($user->checkPassword($_POST['password']) == TRUE) {

            //echo 'login';

            session_start();
            $_SESSION["userID"] = $user->id;
			header("Location: index.php?page=tasks&action=all");
        } else {
            echo 'password does not match';
        }
    }
}



}