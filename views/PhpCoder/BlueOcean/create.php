<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;

if(!isset($_SESSION)) session_start();
echo Message::message();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Login Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="../../../resource/assets/js/html5shiv.js"></script>
    <script src="../../../resource/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top content -->
<div class="top-content">


            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Book Title</h3>
                            <p>Enter your book Information</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action=" " method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-book_title">book_title</label>
                                <input type="text" name="book_title" placeholder="Book Title..." class="form-book_title form-control" id="form-book_title">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-author_title">author_title</label>
                                <input type="text" name="author_title" placeholder="Author Title..." class="form-author_title form-control" id="form-author_title">
                            </div>
                            <button type="submit" class="btn">Create</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>

    </div>

<!-- Javascript -->
<script src="../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>