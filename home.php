<?php
include_once('vendor/autoload.php');

if(!isset($_SESSION) )session_start();
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\User\Auth;
$obj= new User();
$obj->prepare($_SESSION);
$singleUser = $obj->view();
$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();
?>
<?php include('header.php');  ?>
<!-- header end -->`
<!-- content -->

<div class="box1">
	<div class="wrapper">
		<div class="login-form">

			<?php if(!$status){ ?>
				<h1>Login to Book Now</h1>
		<form role="form" action="views/PhpCoder/User/Authentication/login.php" method="post" class="login-form">

				<label class="sr-only" for="email">Email</label>
				<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">

				<label class="sr-only" for="form-password">Password</label>
				<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">

			<button type="submit" class="btn">Sign in!</button>
			<a href="views/PhpCoder/User/Profile/signup.php"><button>SignUp</button> </a>
		</form>
	<?php }else{ ?>
				<h2>Hello <a href="user.php" class="home_user_name"><?php echo "$singleUser->first_name $singleUser->last_name"?>!</a> <span class="logout"> <a href= "views/PhpCoder/User/Authentication/logout.php" > LOGOUT </a></span></h2>
	<?php }?>

</div>
		<div class="kwicks-wrapper marg_bot1">
			<ul class="kwicks horizontal">
				<li><img src="resource/assets/images/img1.jpg" alt=""></li>
				<li><img src="resource/assets/images/img2.jpg" alt=""></li>
				<li><img src="resource/assets/images/img3.jpg" alt=""></li>
				<li><img src="resource/assets/images/img4.jpg" alt=""></li>
			</ul>
		</div>
	</div>
	<div class="pad">
		<div class="line1"><div class="wrapper line2">
			<div class="col1">
				<h2><img src="resource/assets/images/title_marker1.jpg" alt="">Best Rates</h2>
				<p class="pad_bot1">Blue Ocean Hotel is one of <a href="http://blog.templatemonster.com/free-website-templates/" target="_blank">by phpCoder Team</a> Best Hotel management offered by phpcoder Team. From BITM PHP F2 course. Batch 35.</p>
				<a href="#" class="color1">Read More</a>
			</div>
			<div class="col1 pad_left1">
				<h2><img src="resource/assets/images/title_marker2.jpg" alt="">Hotel Guide</h2>
				<p class="pad_bot1"><a href="http://blog.templatemonster.com/2011/10/24/free-website-template-accordion-hotel/" target="_blank" rel="nofollow"> </a> Blue Ocean Hotel is available 24/7. It's a best comfortable zone for everyone.</p>
				<a href="#" class="color1">Read More</a>
			</div>
			<div class="col1 pad_left1">
				<h2><img src="resource/assets/images/title_marker3.jpg" alt="">Packages</h2>
				<p class="pad_bot1">This Blue Ocean Hotel website  <a href="home.php">About Us</a>, <a href="Services.html">Services</a>, <a href="Booking.html">Booking</a>, <a href="Rooms.html">Our Rooms</a>, <a href="Locations.html">Contact Us</a> contact us for more</p>
				<a href="#" class="color1">Read More</a>
			</div>
		</div></div>
	</div>
</div>
<?php include('footer.php'); ?>