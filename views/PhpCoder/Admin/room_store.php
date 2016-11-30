<?php
include_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Room\Room;


$objRoom = new Room();
$imageName = time().$_FILES['fileUpload']['name'];
$tmp_location = $_FILES['fileUpload']['tmp_name'];
$fileLocation = '../../../resource/assets/img/room/'.$imageName;
move_uploaded_file($tmp_location, $fileLocation);
$_POST['file_path']= $imageName;
$objRoom->prepare($_POST);
$objRoom->store();