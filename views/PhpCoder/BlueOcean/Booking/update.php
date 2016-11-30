<?php
require_once("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;
use App\Utility\Utility;

$objUpdate=new BookTitle();
$objUpdate->setData($_POST);
$objUpdate->update();


