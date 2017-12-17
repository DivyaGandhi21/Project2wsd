<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,500,700'>
<link rel="stylesheet" href="login.css" type="text/css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

        <div class="login-page">
				<div class="form">
					<h3>UPDATE DETAILS</h3>
            <form action="index.php?page=tasks&action=edit&id=<?php echo $data->id; ?>" method="post">

			<label><b>ID: <?php echo $_GET['id']; ?></b></label><br><br>
			
                <input type="text" name="createddate" id="createddate" placeholder="Create Date" required autofocus/>
						<input type="text" name="duedate" id="duedate" placeholder="Due Date" required autofocus/>
						<input type="text" name="message" id="message" placeholder="Message" required autofocus/>
						<input type="text" name="isdone" id="isdone" placeholder="IS Done" required autofocus/><br>
						<button name="entrar" type="submit" id="contact-submit" value="entrar">Update</button>
                
            </form>
        </div>


<script src="js/scripts.js"></script>
</body>
</html>


