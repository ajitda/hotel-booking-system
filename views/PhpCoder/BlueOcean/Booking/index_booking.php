<?php
require_once("../../../../vendor/autoload.php");
use App\BITM\PhpCoder\BlueOcean\BookingInfo;
use App\BITM\PhpCoder\Message\Message;
use App\BITM\PhpCoder\Utility;

$obj_bookingInfo= new BookingInfo();
$obj_bookingInfo->prepare($_POST);
$allData = $obj_bookingInfo->index('obj');

if(!isset($_SESSION)) session_start();
echo Message::message();
$serial=1;

######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);
$someData = $obj_bookingInfo->indexPaginator($page,$itemsPerPage);

$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################



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
            <h2>Active List of Bookings</h2>

 <?php

echo "<table border='2px'>";

 echo "<th    style='width: 50px' > <input type='checkbox'  id='checkall'>All</th>";


 echo "<th> Serial </th><th> ID </th> <th> Customer Name </th> <th> Package </th> <th> Check In </th> <th> Check Out </th> <th>Rooms </th> <th> Adults </th> <th>Childrens</th> <th> Persons </th> <th> Price </th><th> Action </th>";

    foreach($someData as $oneData){  ########### Traversing $someData is Required for pagination  #############

    echo "<tr style='height: 40px'>";

                echo "<td  style='align-content: center'><input type='checkbox' name='mark[]' value='$oneData->id'></td>";

        echo "<td> $serial</td>";
        echo "<td> $oneData->id </td>";
        echo "<td> $oneData->customer_name </td>";
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
            <a href='../../Admin/trash_booking.php?id=$oneData->id'><button class='btn btn-danger' role='button'>Delete</button></a>


        </td>";

        echo "</tr>";
    $serial++;
    } //end of foreach loop

    echo "</table>";
?>
            <!--  ######################## pagination code block#2 of 2 start ###################################### -->
            <div align="left" class="container">
                <ul class="pagination">

                    <?php

                    $pageMinusOne  = $page-1;
                    $pagePlusOne  = $page+1;
                    if($page>$pages) Utility::redirect("index_booking.php?Page=$pages");

                    if($page>1)  echo "<li><a href='index_booking.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";
                    for($i=1;$i<=$pages;$i++)
                    {
                        if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                        else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

                    }
                    if($page<$pages) echo "<li><a href='index_booking.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

                    ?>

                    <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                        <?php
                        if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                        if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                        else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                        if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                        if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                        if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                        else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                        if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                        else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                        ?>
                    </select>
                </ul>
            </div>
            <!--  ######################## pagination code block#2 of 2 end ###################################### -->



</body>
</html>




