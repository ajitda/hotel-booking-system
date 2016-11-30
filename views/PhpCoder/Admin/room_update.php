<?php

require_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Room\Room;
$objRoom = new Room();


if(!empty($_FILES['fileUpload']['name'])) {
    $imageName = time() . $_FILES['fileUpload']['name'];
    $tmp_location = $_FILES['fileUpload']['tmp_name'];
    $fileLocation = '../../../resource/assets/img/room/'.$imageName;
    move_uploaded_file($tmp_location, $fileLocation);
    $_POST['file_path'] = $imageName;
}

$objRoom->prepare($_POST);
$objRoom->update();

