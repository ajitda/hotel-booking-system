<?php
require_once("../../../vendor/autoload.php");
use App\BITM\PhpCoder\User\User;

$objUser = new User();
$objUser->prepare($_GET);
$objUser->delete();