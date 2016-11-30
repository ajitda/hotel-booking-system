<?php
require_once("../../../../vendor/autoload.php");
use App\BITM\PhpCoder\Message\Message;

if(!isset($_SESSION)) session_start();
echo Message::message();

?>




<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlueOcean </title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../../../../resource/assets/js/html5shiv.js"></script>
    <script src="../../../../resource/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">


    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Booking</h3>
                    <p>Enter your Booking Info</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-booking"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="store_booking.php" method="post" class="login-form">
                    <div class="form-group">
                        Customer Name <label class="sr-only" for="form-customer_name">Customer Name</label>
                        <input type="text" name= "customer_name" placeholder="Enter your name..." class="form-customer_name form-control" id="form-customer_name">
                    </div>


                    <div class="form-group">
                       Package <select name="package_info">
                            <option >Family</option>
                            <option >Shopping</option>
                            <option >Business</option></select>
                    </div>

                    delux - 1 room 10000 taka, business - 20000 taka, . . . .

                    <div class="form-group">

                        <!--Check In <input type="text"  name="check_in"  class="form-check_in form-control" id="datepicker"> -->
                    Check In: <input name="check_in" id="dateField" type="date" min="2014-01-01" disabled>
                    </div>


                    <div class="form-group">

                        <!--Check In <input type="text"  name="check_in"  class="form-check_in form-control" id="datepicker"> -->
                        Check Out: <input name="check_out" id="dateField1" type="date" min="2014-01-01" disabled>
                    </div>

                    <div class="form-group">
                           Rooms <select name="rooms" >
                            <option >1</option>
                            <option >2</option>
                            <option >3</option></select>
                    </div>

                    <div class="form-group">
                       Adults <select name="adult" >
                            <option >0</option>
                            <option >1</option>
                            <option >2</option>
                            <option >3</option></select>
                    </div>

                    <div class="form-group">
                        Childrens <select name="children" >
                            <option >0</option>
                            <option >1</option>
                            <option >2</option>
                            <option >3</option></select>
                    </div>

                    <div class="form-group">
                        Persons <select name="person" >
                            <option >1</option>
                            <option >2</option>
                            <option >3</option></select>
                    </div>

                    <div class="form-group">
                        Price <label class="sr-only" for="form-price">Price</label>
                        <input type="number" name="price" class="form-price form-control" id="form-price">
                    </div>


                    <button type="submit" class="btn">Book Now</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

    </div>

</div>

<!-- Javascript -->

<script src="../../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>

<script>
    var input = document.getElementById("dateField");
    var today = new Date();
    var day = today.getDate();
    // Set month to string to add leading 0
    var mon = new String(today.getMonth()+1); //January is 0!
    var yr = today.getFullYear();

    if(mon.length < 2) { mon = "0" + mon; }

    var date = new String( yr + '-' + mon + '-' + day );

    input.disabled = false;
    input.setAttribute('min', date);

</script>

<script>
    var input = document.getElementById("dateField1");
    var today = new Date();
    var day = today.getDate();
    // Set month to string to add leading 0
    var mon = new String(today.getMonth()+1); //January is 0!
    var yr = today.getFullYear();

    if(mon.length < 2) { mon = "0" + mon; }

    var date = new String( yr + '-' + mon + '-' + day );

    input.disabled = false;
    input.setAttribute('min', date);

</script>


