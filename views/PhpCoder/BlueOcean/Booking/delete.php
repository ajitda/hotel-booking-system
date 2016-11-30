<?php
require_once("../../../vendor/autoload.php");

use App\BookTitle\BookTitle;
$objDelete=new BookTitle();
$objDelete->setData($_GET);
$objDelete->delete();
?>