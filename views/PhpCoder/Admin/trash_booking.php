<?php
//if(!isset($_SESSION) )session_start();
require_once("../../../vendor/autoload.php");
use App\BITM\PhpCoder\BlueOcean\BookingInfo;

$obj_bookingInfo= new BookingInfo();
$obj_bookingInfo->prepare($_POST);
$obj_bookingInfo->trash();
