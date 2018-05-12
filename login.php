<?php
include_once('includez/connection.php');
$status = '';

if(isset($_POST['username'])){
     $username = mysqli_real_escape_string($dbConx,$_POST['username']);
     $password = mysqli_real_escape_string($dbConx,$_POST['password']);

    if($username=='' ||$password==''){$status ='<div class="alert alert-danger">Fill in all fields</div>';}
	else{
		$hPassword = md5($password);
		$sql = "SELECT id,email,password FROM members WHERE email='$username' AND password='$hPassword' LIMIT 1";
		$query = mysqli_query($dbConx,$sql);	
		if(mysqli_num_rows($query)<1){$status ='<div class="alert alert-danger">Invalid Login Details</div>';}
		else{
			while($row = mysqli_fetch_array($query)){
				$member_id = $row[0];
				$member_email = $row[1];
				$member_password = $row[2];
				
				//Create Login Session
				session_start();
				$_SESSION['member_id'] = $member_id;
				$_SESSION['member_password'] = $member_password;
				$_SESSION['member_email'] = $member_email;
				
				header('location: application.php'); exit();
		}
		}
	    }

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>A Girls Who Code Website</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.html">
							<h1><span class="fa fa-signal" aria-hidden="true"></span> A Girls Who Code <label>Website</label></h1>
						</a>
					</div>
					<!--/.navbar-header-->

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li><a href="index.html" class="effect-3">Home</a></li>
								<li><a href="register.html" class="effect-3">Register</a></li>
								<li class="dropdown">
								<li><a href="login.html" class="effect-3">Log In</a></li>
								<li class="dropdown">
								<li class="dropdown">
									<a href="services.html" class="dropdown-toggle effect-3" data-toggle="dropdown">Services <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="services.html">Services 2</a></li>
										<li class="divider"></li>
									</ul>
								</li>
								<li><a href="events.html" class="effect-3">Events</a></li>
								<li><a href="contact.html" class="effect-3">Contact</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>
	<!-- banner -->
	<div class="inner_page_agile">
		<h3>Our Work</h3>
		<p>Im the ever evolving wolrd of technology,it is our duty to follow and also create our trend.<br>
		We are ever studying and using our knowledge of sofwares to make life easier and also<br>
		harness the unspeakable abundance of possibilities in our craft.</p>

	</div>
	<!--//banner -->
	<!--/w3_short-->
	<div class="services-breadcrumb_w3layouts">
		<div class="inner_breadcrumb">

			<ul class="short_w3ls"_w3ls>
				<li><a href="index.html">Home</a><span>|</span></li>
				<li>Login</li>
			</ul>
		</div>
	</div>
	<!--//w3_short-->
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<!---728x90--->
			<div class="tittle_head_w3ls">
				<h3 class="tittle three">LogIn to your Account </h3>
			</div>
			<!---728x90--->
			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
					<?php echo $status;?>
						<form action="#" method="post">
							<input type="email" name="username" placeholder="E-mail" required="">
							<input type="password" name="password" placeholder="Password" required="">
							<div class="tp">
								<input type="submit" value="Login">
							</div>
						</form>
					</div>
					<div class="login-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
					<p><a href="register.html"> Don't have an account?</a></p>
				</div>
			</div>
			<!---728x90--->
		</div>
	</div>
	<div class="footer_top_agileits">
		<div class="container">
			<div class="col-md-4 footer_grid">
				<h3>About Us</h3>
				<p>We are the Girls Who Code and our aim is to introduce technology to GIRLS
					in Africa and beyond.
				</p>
			</div>
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>1 Aguyi ironsi street, Transcorp,Maitama,Asokoro <span>Abuja FCT.</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:joeysleek25@gmail.com">joeysleek25@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+234 7037 67 2762</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
	<!-- //footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<!-- password-script -->
	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>