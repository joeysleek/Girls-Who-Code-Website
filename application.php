<?php
include_once('includez/check_log.php');
$status='';

if(isset($_POST['phone'])){
	$phone = mysqli_real_escape_string($dbConx,$_POST['phone']);
	$comment = mysqli_real_escape_string($dbConx,$_POST['comment']);
	$qualification = mysqli_real_escape_string($dbConx,$_POST['qualification']);
	$resume = $_FILES['resume'];
	$video = $_FILES['video'];
	
	if($phone==''||$comment==''||$qualification==''){$status = '<div class="alert alert-danger">Please fill all fields</div>';}
	else{
		//process resume
		$fileName = $_FILES['resume']['name'];//file name
		$fileTmpLoc = $_FILES['resume']['tmp_name'];//file in the php tmp folder
		$xPlode = explode (".", $fileName);//split the file name into an array using a dot
		$fileExt = strtolower(end($xPlode));//string to lower to convert the letters to lower case
		$resumeName = $phone.'.'.$fileExt;
		$uploadAction = move_uploaded_file($fileTmpLoc, "resume/$resumeName");
		
		//process video
		$fileName = $_FILES['video']['name'];//file name
		$fileTmpLoc = $_FILES['video']['tmp_name'];//file in the php tmp folder
		$xPlode = explode (".", $fileName);//split the file name into an array using a dot
		$fileExt = strtolower(end($xPlode));//string to lower to convert the letters to lower case
		$videoName = $phone.'.'.$fileExt;
		$uploadAction = move_uploaded_file($fileTmpLoc, "video/$videoName");
		
		
		
		$sql="UPDATE members SET mobile='$phone',comment='$comment',qualification='$qualification',resume='$resumeName',video='$videoName' WHERE id='$member_id' LIMIT 1";
		$query = mysqli_query($dbConx,$sql) or die(mysqli_error($dbConx));
		if($query){$status = '<div class="alert alert-success">Correct! Application Completed</div>';}
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $memberFullname?> || Girls Who Code Website</title>
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
							<h1><span class="fa fa-signal" aria-hidden="true"></span> Girls Who Code <label>Website</label></h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.html" class="effect-3">Home</a></li>
								<li><a href="register.html" class="effect-3">Register</a></li>
								<li class="dropdown">
								<li class="dropdown">
								</li><li class="dropdown">
									<a href="services.html" class="dropdown-toggle effect-3" data-toggle="dropdown">Services <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="services.html">Our Services</a></li>
										<li class="divider"></li>
									</ul>
								</li>
								<li><a href="events.html" class="effect-3">Events</a></li>
								<li><a href="contact.html" class="effect-3">Contact</a></li>
								</li><li><a href="logout.php" class="effect-3">Log Out</a></li>
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
	
	<!--//banner -->
	
	<!-- //banner-bottom -->
	
	<!-- services -->
	
	<!-- //services -->
	<!-- /mid-services -->
	
	<!-- //mid-services -->
	<div class="candidate_cv">
		<div class="tittle_head_w3ls">
			<h3 class="tittle two"><small>Welcome</small> <?php echo $memberFullname?></h3>
	
		<h3 class="tittle two"><small>Complete your Registration</small></h3>
		</div>
		<div class="inner_sec_grids_info login-form">

		<?php echo $status?>		
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="col-md-6 form-left">
					<div class="form-inputs email">
						<p>Full name</p>
						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text"  placeholder="" value="<?php echo $memberFullname?>" readonly required="">
					</div>
					<div class="form-inputs name">
						<p>Email</p>
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="email"  placeholder="" value="<?php echo $member_email?>" readonly required="">
					</div>
					<div class="form-inputs name">
						<p>Phone</p>
						<i class="fa fa-phone" aria-hidden="true"></i>
						<input type="text" name="phone" placeholder="">
					</div>

				</div>
				<div class="col-md-6 form-right">
					<div class="form-inputs name">
						<p>Why do you want to join the girls who code Program?</p>
						<i class="fa fa-comment" aria-hidden="true"></i>
						<textarea name="comment" placeholder=""></textarea>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-inputs">
					<p>Specify your current Academic Status</p>
					<ul>
						<li>
							<input type="radio" id="a-option" checked value="SSCE" name="qualification">
							<label for="a-option">SSCE </label>
							<div class="check"></div>
						</li>
						<li>
							<input type="radio" id="b-option" value="Ordinary National Diploma"  name="qualification">
							<label for="b-option">Ordinary National Diploma</label>
							<div class="check"></div>
						</li>
						<li>
							<input type="radio" id="c-option" value="Higer National Diploma"  name="qualification">
							<label for="c-option">Higer National Diploma</label>
							<div class="check"></div>
						</li>
						<li>
							<input type="radio" id="d-option" value="Bachelors Degree"  name="qualification">
							<label for="d-option">Bachelors Degree</label>
							<div class="check"></div>
						</li>
						
						<li>
							<input type="radio" id="d-option" value="Others"  name="selector1">
							<label for="d-option">Others</label>
							<div class="check"></div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="form-inputs upload">
					<p>Upload your resume</p>
					<input type="file" id="fileselect" name="resume">
					<div id="filedrag">Upload</div>
				</div><br>
				
				<div class="form-inputs upload">
					<p>Upload a 1 min Video </p>
					<input type="file" id="fileselect" name="video">
					<div id="filedrag">Upload</div>
				</div>
				<input type="submit" value="Submit">
					
			</form>

		</div>
	</div>
	<!-- //testimonials -->
	

	<!-- footer -->
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
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>1 Aguyi ironsi street, Transcorp,Maitama,Asokoro<span>Abuja FCT.</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:joeysleek25@gmail.com">joeysleek25@gmail.com</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+234 7037 67 2762</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_w3ls">
		<div class="container">
			<div class="footer_bottom">
				<div class="col-md-9 footer_bottom_grid">
					<div class="footer_bottom1">
						<a href="index.html">
							<h2><span class="fa fa-signal" aria-hidden="true"></span> Girls Who Code <label>Website</label></h2>
						</a>
						<p>© 2018 GWC. All rights reserved | Design by <a href="http://joeysleek25@gmail.com/">Josephine Bosah</a></p>
					</div>
				</div>
				<div class="col-md-3 footer_bottom_grid">
					<h6>Follow Us</h6>
					<div class="social">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
	<!-- //footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>