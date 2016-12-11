<?php
require_once("../../../vendor/autoload.php");
use App\BITM\PhpCoder\User\User;
use App\BITM\PhpCoder\BlueOcean\BookingInfo;

$objUser = new BookingInfo();
$objUser->prepare($_GET);
$objUser->delete();