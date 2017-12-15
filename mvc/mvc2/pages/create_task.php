<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">


</head>

<body>


<form action="index.php?page=tasks&action=create" method="post">
    Owner Email: <input type="text" name="owneremail"><br/>
    Owner ID: <input type="text" name="ownerid"><br/>
    Create Date: <input type="text" name="createddate"><br/>
    Due Date: <input type="text" name="duedate"><br/>
    Message: <input type="text" name="message"><br/>
    Is Done: <input type="text" name="isdone"><br/><br>

    <button type="submit" id="create">Add</button>
</form>


<script src="js/scripts.js"></script>
</body>
</html>