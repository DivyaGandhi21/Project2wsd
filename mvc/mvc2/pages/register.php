<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

	<link rel='stylesheet prefetch' href='https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css'>
	<link rel="stylesheet" href="stylstyle_register.css">
	

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>

<h3>CREATE ACCOUNT</h3>

<div class="main">
		<div class="border"></div>
		<form action="index.php?page=accounts&action=register" method="post">
				<div class="input-group">
					<input type="text" name="First Name" value="" placeholder="First Name" class="form-control" required >	
					<div class="input-icon"><i class="fa fa-user"></i></div>
				</div>
				<div class="input-group">
					<input type="text" name="Last Name" value="" placeholder="Last Name" class="form-control" required >	
					<div class="input-icon"><i class="fa fa-user"></i></div>
				</div>
				<div class="input-group">
					<input type="email" name="email" value="" placeholder="Email" class="form-control" required>
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
				</div>
				<div class="input-group">
					<input type="text" name="Contact No" value="" placeholder="Contact No" class="form-control" required>
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
				</div>
				<div class="input-group">
					<input type="text" name="Birth Date" value="" placeholder="Birth Date" class="form-control" required>
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
				</div>
				<div class="input-group">
					<input type="text" name="Gender" value="" placeholder="Gender" class="form-control" required>
					<div class="input-icon"><i class="fa fa-envelope"></i></div>
				</div>
				<div class="input-group">
					<input type="password" name="password" value="" placeholder="Password" class="form-control" required >
					<div class="input-icon"><i class="fa  fa-lock"></i></div>
				</div>
				<br>
				<input type="submit" name="signup" value="Sign Up" class="signup" >
		</form>
	</div>


<script src="js/scripts.js"></script>
</body>
</html>
