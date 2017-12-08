<!doctype html>

<html lang="en">
<head>
<meta charset="UTF-8">
  <title>Material Design login/signup form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,500,700'>
<link rel="stylesheet" href="login.css" type="text/css">

      <link rel="stylesheet" href="css/style.css">
  <!--  <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">-->

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>


<h1>
    <?php

    //this how to print some data;
   // echo $data['Login'];

    ?> </h1>

<!--<h1><a href="index.php?page=accounts&action=all">Show All Accounts</a></h1>
<h1><a href="index.php?page=tasks&action=all">Show All Tasks</a></h1>-->


<div class="login-page">
				<div class="form">
					<h3>LOGIN FORM</h3>
					<form class="login-form" action="index.php?page=accounts&action=login" method="post" action="" enctype="multipart/form-data">
						<input type="text" name="email" id="login" placeholder="Username" required autofocus/>
						<input type="password" name="password" id="senha" placeholder="Password" required autofocus/>
						<button name="entrar" type="submit" id="contact-submit" value="entrar">Login</button>
						<p class="message">Don't have account? <a href="index.php?page=accounts&action=register">Create Account!</a></p>
					</form>
				</div>
			</div>
  
</body>

<!--<h1><a href="index.php?page=accounts&action=register">Register</a></h1>-->
<script src="js/scripts.js"></script>
</body>
</html>