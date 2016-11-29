<?php
require_once("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;

$objsoftDelete=new BookTitle();
$objsoftDelete->setData($_GET);
$objsoftDelete->trash();
