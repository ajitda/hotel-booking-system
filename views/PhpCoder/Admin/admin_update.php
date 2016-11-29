<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/29/2016
 * Time: 8:33 PM
 */

require_once('../../../vendor/autoload.php');
use App\BITM\PhpCoder\Admin\Admin;


$objAdmin = new Admin();
$objAdmin->prepare($_POST);
$objAdmin->update();