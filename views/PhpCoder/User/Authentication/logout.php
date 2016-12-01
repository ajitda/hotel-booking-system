<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\User\Auth;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;


$auth= new Auth();
$status= $auth->log_out();

session_destroy();
session_start();

Message::message("
                <div class=\"alert alert-success\">
                            <strong>Logout!</strong> You have been logged out successfully.
                </div>");
return Utility::redirect('../../../../home.php');