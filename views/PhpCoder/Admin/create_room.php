<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Admin\Admin;
use App\BITM\PhpCoder\Admin\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;

$obj= new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Profile/login.php');
    return;
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../../../resource/assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.css">

    <script src="../../../resource/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="../../../resource/assets/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="../../../resource/assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

<!-- Demo page code -->

<script type="text/javascript">
    $(function() {
        var match = document.cookie.match(new RegExp('color=([^;]+)'));
        if(match) var color = match[1];
        if(color) {
            $('body').removeClass(function (index, css) {
                return (css.match (/\btheme-\S+/g) || []).join(' ')
            })
            $('body').addClass('theme-' + color);
        }
        $('[data-popover="true"]').popover({html: true});
    });
</script>
<style type="text/css">
    #line-chart {
        height:300px;
        width:800px;
        margin: 0px auto;
        margin-top: 1em;
    }
    .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover {
        color: #fff;
    }
</style>

<script type="text/javascript">
    $(function() {
        var uls = $('.sidebar-nav > ul > *').clone();
        uls.addClass('visible-xs');
        $('#main-menu').append(uls.clone());
    });
</script>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../../../resource/assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<!--<![endif]-->

<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="" href="index1.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Blue Ocean Admin Panel</span></a></div>

    <div class="navbar-collapse collapse" style="height: 1px;">
        <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo "$singleUser->first_name $singleUser->last_name"?>
                    <i class="fa fa-caret-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="Profile">My Account</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Admin Panel</li>
                    <li><a href="Profile">Users</a></li>
                    <li><a href="Profile">Security</a></li>
                    <li><a tabindex="-1" href="Profile">Payments</a></li>
                    <li class="divider"></li>
                    <li><a tabindex="-1" href="Authentication/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>

    </div>
</div>
</div>


<div class="sidebar-nav">
    <ul>
        <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
        <li><ul class="dashboard-menu nav nav-list collapse in">
                <li><a href="index.php"><span class="fa fa-caret-right"></span> Main</a></li>

                <li ><a href="user_list.php"><span class="fa fa-caret-right"></span> User List</a></li>
                <li ><a href="user.html"><span class="fa fa-caret-right"></span> User Profile</a></li>

                <li ><a href="users.html"><span class="fa fa-caret-right"></span> User List</a></li>
                <li ><a href="view_room.php"><span class="fa fa-caret-right"></span> Room Management</a></li>

                <li ><a href="create_admin.php"><span class="fa fa-caret-right"></span> Create Admin</a></li>
                <li ><a href="admin_list.php"><span class="fa fa-caret-right"></span> Admin Management</a></li>
                <li ><a href="calendar.html"><span class="fa fa-caret-right"></span> Calendar</a></li>
            </ul></li>
        <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Account <span class="label label-info">+3</span></a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
                <li ><a href="sign-in.html"><span class="fa fa-caret-right"></span> Sign In</a></li>
                <li ><a href="sign-up.html"><span class="fa fa-caret-right"></span> Sign Up</a></li>
                <li ><a href="reset-password.html"><span class="fa fa-caret-right"></span> Reset Password</a></li>
            </ul></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Legal<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
                <li ><a href="privacy-policy.html"><span class="fa fa-caret-right"></span> Privacy Policy</a></li>
                <li ><a href="terms-and-conditions.html"><span class="fa fa-caret-right"></span> Terms and Conditions</a></li>
            </ul></li>

        <li><a href="help.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help</a></li>
        <li><a href="faq.html" class="nav-header"><i class="fa fa-fw fa-comment"></i> Faq</a></li>
        <li><a href="http://portnine.com/bootstrap-themes/aircraft" class="nav-header" target="blank"><i class="fa fa-fw fa-heart"></i> Get Premium</a></li>
    </ul>
</div>

<div class="content">
    <div class="header">
        <div class="stats">
            <p class="stat"><span class="label label-info">5</span> Tickets</p>
            <p class="stat"><span class="label label-success">27</span> Tasks</p>
            <p class="stat"><span class="label label-danger">15</span> Overdue</p>
        </div>

        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class=""><a href="index.php">Dashboard</a></li>
            <li class="active">Create Admin</li>
        </ul>

    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>

            <div class="col-sm-5">

                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <dv>

                            <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                                <div  id="message" class="form button"   style="font-size: smaller  " >
                                    <center>
                                        <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                            echo "&nbsp;".Message::message();
                                        }
                                        Message::message(NULL);
                                        ?></center>
                                </div>
                            <?php } ?>
                        </dv>
                        <div class="form-top-left">
                            <h3>Add Room</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="room_store.php" method="post" class="registration-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="sr-only" for="form-first_name">Room No:</label>
                                <input type="text" name="room_no" placeholder="Enter your Room No..." class="form-first-name form-control" id="form-first-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-last-name">Type of Room</label>
                                <input type="text" name="room_name" placeholder="Enter Type of Room..." class="form-last-name form-control" id="form-last-name">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-room-size">Room Size</label>
                                <input type="text" name="room_size" placeholder="Enter Room Size..." class="form-email form-control" id="form-email">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-bed_no">Bed No</label>
                                <input type="radio" name="bed_no" value="1">01
                                <input type="radio" name="bed_no" value="2">02
                                <input type="radio" name="bed_no" value="3">03
                                <input type="radio" name="bed_no" value="4">04

                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Rate</label>
                                <input type="number" name="rate" placeholder="Enter Room Price..." class="form-phone form-control" id="form-phone">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="address">Description</label>
                                <input type="text" name="description" placeholder="Enter Room Description..." class="form-address form-control" id="form-address">
                            </div>
                            <div class="form-group">
                                <label for="form-author">Select your Room Picuture</label>
                                <input type="file" name="fileUpload"  class="form-author form-control" id="form-author">
                            </div>

                            <button type="submit" class="btn">Create Room!</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<footer>
    <hr>

    <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
    <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
    <p>© 2014 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
</footer>


<script src="../../../resource/assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
    $("[rel=tooltip]").tooltip();
    $(function() {
        $('.demo-cancel-click').click(function(){return false;});
    });
</script>


<script>
    $('.alert').slideDown("slow").delay(5000).slideUp("slow");
</script>

</body></html>
