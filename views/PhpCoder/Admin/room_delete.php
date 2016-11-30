<?php
require_once("../../../vendor/autoload.php");
use App\BITM\PhpCoder\Room\Room;
$objRoom = new Room();
$objRoom->prepare($_GET);
$objRoom->delete();