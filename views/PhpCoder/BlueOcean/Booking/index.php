<?php
require_once("../../../../vendor/autoload.php");
use App\BITM\PhpCoder\BlueOcean\BookingInfo;
use App\BITM\PhpCoder\Message;
use App\BITM\PhpCoder\Utility;

$obj_bookingInfo= new BookingInfo();
$obj_bookingInfo->prepare($_POST);
$allData = $obj_bookingInfo->index();

$serial=1;
?>

<!DOCTYPE html>
<html>
<h1> Active List</h1>

<head>
    <link rel="stylesheet" href="../../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <!--    <link rel="stylesheet" href="../../../resource/assets/font-awesome/css/font-awesome.min.css">-->
    <script src="../../../../resource/assets/js/jquery-1.11.1.min.js"></script>



</head>

<body>


<table>
    <tr>
        <td width="500">
            <h2>Active List of Book Titles</h2>

 <?php

echo "<table border='2px'>";

    echo "<th style='width: 50px'>";

        echo "<th> Serial </th><th> ID </th> <th> Customer Name </th> <th> Package </th> <th> Check In </th> <th> Check Out </th>Rooms <th> Adults </th> Childrens <th> Persons </th> <th> Price </th><th> Action </th>";

    foreach($allData as $oneData){  ########### Traversing $someData is Required for pagination  #############

    echo "<tr style='height: 40px'>";

                echo "<td  style='align-content: center'><input type='checkbox' name='mark[]' value='$oneData->id'></td>";

        echo "<td> $serial</td>";
        echo "<td> $oneData->id </td>";
        echo "<td> $oneData->customer_name </td>";
        echo "<td> $oneData->booking_number </td>";
        echo "<td> $oneData->package_info </td>";
        echo "<td> $oneData->check_in </td>";
        echo "<td> $oneData->check_out </td>";
        echo "<td> $oneData->rooms </td>";
        echo "<td> $oneData->adult </td>";
        echo "<td> $oneData->children </td>";
        echo "<td> $oneData->person </td>";
        echo "<td> $oneData->price </td>";

        echo "<td>
            <a href='view.php?id=$oneData->id'><button class='btn btn-info' role='button'>View</button></a>
            <a href='edit.php?id=$oneData->id'><button class='btn btn-info' role='button'>Edit</button></a>
            <a href='trash.php?id=$oneData->id'><button class='btn btn-danger' role='button'>Trash</button></a>
            <a href='delete.php?id=$oneData->id'><button class='btn btn-danger'>Delete</button></a>

        </td>";

        echo "</tr>";
    $serial++;
    } //end of foreach loop

    echo "</table>";
?>
</body>
</html>




