<?php
if(!isset($_SESSION) )session_start();
include_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Admin\Admin;
use App\BITM\PhpCoder\Admin\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
use App\BITM\PhpCoder\Room\Room;


$obj= new Admin();
$obj->prepare($_SESSION);
$singleUser = $obj->view();

$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();

if(!$status) {
    Utility::redirect('Profile/login.php');
    return;
}
$room = new Room();
$allRoom = $room->index1("obj");

################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) )$allRoom =  $room->search($_REQUEST);
$availableKeywords=$room->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';
################## search  block 1 of 5 end ##################





######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allRoom);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$allRoom = $room->indexPaginator($page,$itemsPerPage);

$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################



################## search  block 2 of 5 start ##################

if(isset($_REQUEST['search']) ) {
    $allRoom = $room->search($_REQUEST);
    $serial = 1;
}
################## search  block 2 of 5 end ##################

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
        <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Blue Ocean Admin Panel</span></a></div>

    <div class="navbar-collapse collapse" style="height: 1px;">
        <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo "$singleUser->first_name $singleUser->last_name"?>
                    <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="./">My Account</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Admin Panel</li>
                    <li><a href="./">Users</a></li>
                    <li><a href="./">Security</a></li>
                    <li><a tabindex="-1" href="./">Payments</a></li>
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
                <li ><a href="user_list.php"><span class="fa fa-caret-right"></span> User Management</a></li>
                <li ><a href="view_room.php"><span class="fa fa-caret-right"></span> Room Management</a></li>
                <li><a href="admin_list.php"><span class="fa fa-caret-right"></span> Admin Management </a> </li>
                <li ><a href="#"><span class="fa fa-caret-right"></span> Booking Management</a></li>
                <li ><a href="calendar.html"><span class="fa fa-caret-right"></span> Calendar</a></li>
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
            <li class="active">Dashboard</li>
        </ul>

    </div>
    <div class="main-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center" style="padding: 8px">
                        <a href='create_room.php'><button class='btn btn-info'>Add Room </button></a>
                        <a href='#'><button class='btn btn-info'>Trash List</button></a>
                    </div>

                    <form id="searchForm" action="view_room.php"  method="get">
                        <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
                        <input type="checkbox"  name="byRoomName"   checked  >By Room No
                        <input type="checkbox"  name="byBedNo"  checked >By Bed No
                        <input hidden type="submit" class="btn-primary" value="search">
                    </form>



                    <?php

                    echo "<table class='table table-bordered table-striped' border='5px' >";
                    echo "<th> serial </th>";
                    echo "<th> Id </th>";
                    echo "<th> Room No </th>";
                    echo "<th> Room Name </th>";
                    echo "<th> Room Size </th>";
                    echo "<th> Bed No </th>";
                    echo "<th> Rate </th>";
                    echo "<th> Description </th>";
                    echo "<th> File Path </th>";
                    echo "<th> Action </th>";
                    foreach($allRoom as $oneRoom){      ########### Traversing $someData is Required for pagination  #############
                        echo "<tr style='height: 40px'>";
                        echo "<td>".$serial."</td>";
                        echo "<td> $oneRoom->id </td>";
                        echo "<td>".$oneRoom->room_no ."</td>";
                        echo "<td>".$oneRoom-> room_name."</td>";
                        echo "<td>".$oneRoom->room_size ."</td>";
                        echo "<td>".$oneRoom->bed_no ."</td>";
                        echo "<td>".$oneRoom-> rate."</td>";
                        echo "<td>".$oneRoom->description ."</td>";
                        echo "<td> <img width=\"150\" height=\"100\" src='../../../resource/assets/img/room/".$oneRoom->file_path."'  ></td>";
                        echo "<td>";
                        echo "<a href='room_details.php?id=$oneRoom->id'><button class='btn btn-info'>View</button></a> ";
                        echo "<a href='room_edit.php?id=$oneRoom->id'><button class='btn btn-primary'>Edit</button></a> ";
                        echo "<a href='room_trash.php?id=$oneRoom->id'><button class='btn btn-warning'>Trash</button></a> ";
                        echo "<a href='room_delete.php?id=$oneRoom->id'><button class='btn btn-danger'>Delete</button></a> ";
                        echo "</td>";
                        echo "</tr>";
                        $serial++;
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--  ######################## pagination code block#2 of 2 start ###################################### -->
    <div align="left" class="container">
        <ul class="pagination">

            <?php

            $pageMinusOne  = $page-1;
            $pagePlusOne  = $page+1;
            if($page>$pages) Utility::redirect("view_room.php?Page=$pages");

            if($page>1)  echo "<li><a href='view_room.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
            for($i=1;$i<=$pages;$i++)
            {
                if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

            }
            if($page<$pages) echo "<li><a href='view_room.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";
            ?>
            <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                <?php
                if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                ?>
            </select>
        </ul>
    </div>
    <!--  ######################## pagination code block#2 of 2 end ###################################### -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" >

                <a href="pdf.php" class="btn btn-primary" role="button">Download as PDF</a>
                <a href="xl.php" class="btn btn-primary" role="button">Download as XL</a>
                <a href="email.php?list=1" class="btn btn-primary" role="button">Email to friend</a>

            </div>
        </div>
    </div>
        <footer>
            <hr>

            <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
            <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
            <p>© 2014 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
        </footer>
    </div>
</div>
</div>






</body>
</html>

<!-- required for search, block 5 of 5 start -->
<script type="text/javascript" language="javascript">
    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block5 of 5 end -->

