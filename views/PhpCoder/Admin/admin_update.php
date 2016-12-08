<?php

if(!isset($_SESSION)) session_start();
require_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Admin\Admin;

$objAdmin = new Admin();
$_POST['email'] = $_SESSION['email'];
$objAdmin->prepare($_POST);
$objAdmin->update();