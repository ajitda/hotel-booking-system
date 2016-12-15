<?php
//if(!isset($_SESSION) )session_start();
require_once("../../../../vendor/autoload.php");
use App\BITM\PhpCoder\BlueOcean\BookingInfo;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility\Utility;
$obj_bookingInfo= new BookingInfo();
$obj_bookingInfo->prepare($_POST);
$obj_bookingInfo->store();
Message::setMessage('<div id="almessage"><strong>Congratulation ! </strong> We have received your booking request Successfully, You will be confirmed shortly through an email.</div>');

return Utility::redirect('../../../../user.php');
