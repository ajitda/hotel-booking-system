<?php
require_once("../../../vendor/autoload.php");
use App\BITM\PhpCoder\User\BookingInfo;

$obj= new BookingInfo();
$obj->prepare($_REQUEST);
$obj->store();